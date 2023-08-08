<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Rate;
use Illuminate\Http\Request;
use App\Traits\UssdMenus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MainAppController extends Controller
{
    use UssdMenus;
    private $skizaCode = "22";

    public function ussdRequestHandler(Request $request)
    {
        $sessionId   = $request["sessionId"];
        $serviceCode = $request["serviceCode"];
        $phone       = str_replace("+", "", $request["phoneNumber"]);
        $text        = $request["text"];

        if (empty($text)) {
            $exploded_text = [];
        } else {
            $exploded_text = explode("*", trim($text));
        }

        if (sizeof($exploded_text) > 0 && $exploded_text[0] == $this->skizaCode) {
            return $this->handleSkizaTune($phone, $exploded_text);
        } else {
            return  $this->handleAdvanceService($phone, $exploded_text);
        }
    }

    private function handleSkizaTune($phone, $exploded_text)
    {
        $size = sizeof($exploded_text);
        if ($size == 1) { //1
            return $this->showSkizaMainMenu();
        } else if ($size == 2 and $exploded_text[1] == "1") { //1*1 Search menu
            //search menu
            return $this->showSearchMenu();
        } else if ($size == 3 and $exploded_text[1] == "1" and $exploded_text[2] == "1") { //1*1*1 Search artist
            //search by artist
            return $this->showSearchByArtistMenu();
        } else if ($size == 3 and $exploded_text[1] == "1" and $exploded_text[2] == "2") { //1*1*1 Search artist
            //search by song
            return  $this->showSearchBySongMenu();
        } else {
            return $this->showSomethingBadMenu("Skiza services are currently down. Please try again later");
        }
    }

    private function handleAdvanceService($phone, $exploded_text) //check if phone is registered and show the right pin menu
    {
        $size = sizeof($exploded_text);
        $artist = Artist::where(['phone' => $phone])->first();
        if (empty($exploded_text)) { //0 Main menu ->>ask for new pin setup or enter a pin
            if ($artist == null) {
                return $this->showSomethingBadMenu("Welcome to Mkononi Royalty Advance System.\n Unfortunately, you have not been registered to use this service. Thank you");
            } 
            else if ($artist->pin_reset == true) { //ask for the pin
                //return $this->showPinResetMenu();
            }
            else if ($artist->pin != null) { //ask for the pin
                return $this->showLoginMenu();
            } else if ($artist->pin == null) { //set up a new pin
                return $this->showNewPINMenu();
            }
        } else if ($size == 1) { //either logging in or 
            $pin = $exploded_text[0];
            if ($artist->pin == null) { //register
                $artist->pin = Hash::make($pin);
                $artist->save();
                //show message for success
                return $this->showSomethingBadMenu("You have set up your pin successfully. Log in with your PIN to use the Royalty Advance System");
            } else { //login
                if ((Hash::check($pin, $artist->pin))) {
                    //
                    return $this->showAcceptDeclineTermsMenu();
                } else {
                    return $this->showSomethingBadMenu("Wrong PIN. Please try again");
                }
            }
        } else if ($size == 2) { //accept or decline terms and conditions
            if ($exploded_text[1] == "1") {
                return $this->showMkononiMainMenu();
            } else {
                return $this->showRejectMenu();
            }
        } else if ($size == 3) {
            $pin = $exploded_text[0];
            if (!Hash::check($pin, $artist->pin)) {
                return $this->showSomethingBadMenu("Wrong PIN. Please try again");
            }

            if ($exploded_text[2] == "1") {
                $loans = $artist->artistLoans->sum('amount');
                $payments = $artist->artistPayments->sum('amount');
                $pendingLoan = $loans - $payments;
                $limit = $artist->loan_limit - $pendingLoan;
                return $this->showLimitMenu($limit);
            } else if ($exploded_text[2] == "2") {
                //Start requesting for advance
                return $this->showAdvanceAmountMenu();
            } else {
                //show terms and conditions
                return $this->showSomethingBadMenu("Invalid entry. Please try again");
            }
        } else if ($size == 4 and $exploded_text[2] == "2") {
            $amount =  $exploded_text[3];
            $loans = $artist->artistLoans->sum('amount');
            $payments = $artist->artistPayments->sum('amount');
            $pendingLoan = $loans - $payments;
            $limit = $artist->loan_limit - $pendingLoan;

            if ($amount > $limit) {
                return $this->showAmountLimitErrorMenu($amount, $limit);
            }
            return $this->showDurationsMenu();
        } else if ($size == 5 and $exploded_text[2] == "2") {
            $duration = $exploded_text[4] == "1" ? 6 : 12;
            //Log::debug("Duration is $duration", $exploded_text);
            $rates = Rate::where('is_active', true)->first();
            $rate_per_month = $rates->interest_per_month;
            $admin_fee = $rates->administrative_fee / 100;
            $amount =  $exploded_text[3];
            $name = $artist->name;
            $repayment_amount = $amount * ($rate_per_month * $duration)/100 + $amount * $admin_fee + $amount;
            return $this->acceptDeclineLoan($amount, $duration, $name, $repayment_amount);
        } else if ($size == 6 and $exploded_text[2] == "2") { //final 
            if ($exploded_text[5] == "1" and $exploded_text[1] == "1") {
                $pin = $exploded_text[0];
                if (!Hash::check($pin, $artist->pin)) {
                    return $this->showSomethingBadMenu("Wrong PIN. Please try again");
                }
                $rates = Rate::where('is_active', true)->first();
                $amount = $exploded_text[3];
                $duration = $exploded_text[4] == "1" ? 6 : 12;
                $rate_per_month = $rates->interest_per_month ;
                $admin_fee = $rates->administrative_fee / 100;
                $name = $artist->name;
                $admin_fee_total = $amount * $admin_fee;
                $interest = $amount  *  ($rate_per_month* $duration)/100;
                $repayment_amount = $amount + $interest + $admin_fee_total;
                $monthly_repayment = floor($repayment_amount/$duration);

                $artist->artistLoans()->create(
                    [
                        'amount'=>$amount,
                        'total_amount_to_repay' => $repayment_amount,
                        'duration' =>$duration,
                        'interest' => $interest,
                        'monthly_repayment_amount' => $monthly_repayment,
                        'processed' =>false,
                        'repaid' => false,
                        'admin_fee' => $admin_fee_total,
                        'monthly_interest' => $rates->interest_per_month,
                        'admin_fee_percentage' => $rates->administrative_fee,
                    ]
                
                );
                return  $this->showFinalAdvanceMenu();
            } else {
                return $this->showRejectMenu();
            }
        } else {
            return $this->showSomethingBadMenu("We could not understand your request. Please try again");
        }
    }
    private function handlePinResetService($phone, $exploded_text) //check if phone is registered and show the right pin menu
    {
        $size = sizeof($exploded_text);
        $artist = Artist::where(['phone' => $phone])->first();

    }


    public function ussd_proceed($ussd_text)
    {
        return response("CON $ussd_text", 200)
            ->header('Content-Type', 'text/plain');
    }
    public function ussd_stop($ussd_text)
    {
        return response("END $ussd_text", 200)
            ->header('Content-Type', 'text/plain');
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Loan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLoanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('loan_create');
    }

    public function rules()
    {
        return [
            'artist_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'numeric',
                'required',
                'min:0',
            ],
            'total_amount_to_repay' => [
                'numeric',
                'required',
                'min:0',
            ],
            'duration' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'interest' => [
                'numeric',
                'min:0',
            ],
            'monthly_repayment_amount' => [
                'numeric',
                'min:0',
            ],
            'code' => [
                'string',
                'nullable',
            ],
            'repaid' => [
                'required',
            ],
            'admin_fee' => [
                'numeric',
                'min:0',
            ],
            'monthly_interest' => [
                'numeric',
                'min:0',
            ],
            'admin_fee_percentage' => [
                'numeric',
                'min:0',
            ],
        ];
    }
}

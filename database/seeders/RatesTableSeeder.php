<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{
    public function run()
    {
        $rates = [
            [
                'interest_per_month'=>9,
                'administrative_fee'=>5,
                'is_active'=>1,
            ],
        ];

        Rate::insert($rates);
    }
}

  
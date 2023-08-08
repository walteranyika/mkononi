<?php

namespace App\Http\Requests;

use App\Models\Rate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rate_create');
    }

    public function rules()
    {
        return [
            'interest_per_month' => [
                'numeric',
                'required',
                'min:0',
                'max:100',
            ],
            'administrative_fee' => [
                'numeric',
                'required',
                'min:0',
                'max:100',
            ],
        ];
    }
}

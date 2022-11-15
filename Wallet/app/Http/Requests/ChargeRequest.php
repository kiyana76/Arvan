<?php

namespace App\Http\Requests;


use App\Rules\MobileValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 *
 * @package App\Http\Requests
 *
 * @property string $mobile
 */

class ChargeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rules = [
            'mobile' => [
                'required',
                new MobileValidation(),
                Rule::exists('mysql_wallet.wallets', 'mobile')
            ],
        ];

        return $rules;
    }
}

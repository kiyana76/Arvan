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
 *
 * @property string $amount
 *
 * @property string $agent
 *
 * @property string $agent_id
 */

class WithdrawRequest extends FormRequest
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
            ],
            'amount' => [
                'required'
            ],

            'agent' => [
                'required',
                Rule::in([
                    'App\Models\Users\User',
                    'App\Models\Promotions\Coupon'
                ])
            ],
            'agent_id' => [
                'required'
            ]
        ];

        return $rules;
    }
}

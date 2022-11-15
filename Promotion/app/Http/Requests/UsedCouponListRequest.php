<?php

namespace App\Http\Requests;

use App\Rules\MobileValidation;
use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * @package App\Http\Requests
 *
 * @property string $mobile
 *
 * @property string $code
 */

class UsedCouponListRequest extends FormRequest
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
        ];

        return $rules;
    }
}

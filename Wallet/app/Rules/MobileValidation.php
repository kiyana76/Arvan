<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MobileValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (preg_match("/^09([0-9][0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/", $value)) {
            return true;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '.این شماره موبایل معتبر نمی باشد';
    }
}

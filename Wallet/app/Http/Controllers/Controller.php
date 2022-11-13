<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Success
    const SUCCESS          = 20000;
    const SUCCESS_DEPOSIT  = 20001;
    const SUCCESS_WITHDRAW = 20002;
    const ERROR_DEPOSIT    = 20003;
    const ERROR_WITHDRAW   = 20004;

    protected function apiResponse($data, $code = 20000, $message = '')
    {
        if (!$message) {
            $key     = "code_response.$code";
            $message = trans($key);

            if ($key == $message) {
                $message = '';
            }
        }

        return [
            'success' => $code >= 20000,
            'message' => $message,
            'code'    => $code,
            'data'    => $data,
        ];
    }
}

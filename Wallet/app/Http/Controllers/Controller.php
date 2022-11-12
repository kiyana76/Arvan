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
    const SUCCESS                                   = 20000;
    const SUCCESS_VERIFY = 20001;
    const SUCCESS_APPLY  = 20002;

    protected function apiResponse($data, $code = 20000, $message = '')
    {
        if (!$message) {
            $key     = "code_responses.{$code}";
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

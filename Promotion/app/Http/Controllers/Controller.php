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
    const SUCCESS                  = 20000;
    const SUCCESS_APPLY            = 20001;
    const ERROR_DEPOSIT_FAILED     = 10002;
    const FAILED                   = 10003;
    const CODE_NOT_FOUND           = 10004;
    const ERROR_COUPON_INACTIVE    = 10005;
    const ERROR_COUPON_NOT_STARTED = 10006;
    const ERROR_COUPON_NOT_ENDED   = 10007;
    const ERROR_COUPON_MAX_COUNT   = 10008;
    const ERROR_APPLY_FAILED       = 10009;

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

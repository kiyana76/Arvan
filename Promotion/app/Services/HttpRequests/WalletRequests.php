<?php

namespace App\Services\HttpRequests;

class WalletRequests extends HttpRequests
{
    public static function deposit($params)
    {
        $url = config('services.wallet') . "/api/wallet/deposit";
        return parent::get($url, $params);
    }

    public static function withdraw($params)
    {
        $url = config('services.wallet') . "/api/wallet/withdraw";
        return parent::get($url, $params);
    }
}

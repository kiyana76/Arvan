<?php

namespace App\Http\Controllers;

use App\Http\Request\DepositRequest;
use App\Repositories\WalletRepository;

class WalletController extends Controller
{
    public function deposit(DepositRequest $request)
    {
        $res = WalletRepository::wallet($request->mobile)->deposit(
            $request->amount,
            $request->agent,
            $request->agent_id
        );

        if ($res)
            return $this->apiResponse('', 20001);
        else
            return $this->apiResponse('', 20003);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChargeRequest;
use App\Http\Requests\DepositRequest;
use App\Http\Requests\WithdrawRequest;
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

        if ($res == self::SUCCESS)
            return $this->apiResponse('', self::SUCCESS_DEPOSIT);
        else
            return $this->apiResponse('', self::ERROR_DEPOSIT);
    }

    public function withdraw(WithdrawRequest $request)
    {
        $res = WalletRepository::wallet($request->mobile)->withdraw(
            $request->amount,
            $request->agent,
            $request->agent_id
        );

        if ($res == self::SUCCESS)
            return $this->apiResponse('', self::SUCCESS_DEPOSIT);
        else
            return $this->apiResponse('', self::ERROR_DEPOSIT);
    }

    public function charge(ChargeRequest $request) {
        $res = WalletRepository::wallet($request->mobile)->charge();
        return $this->apiResponse($res, self::SUCCESS);
    }
}

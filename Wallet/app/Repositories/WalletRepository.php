<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use App\Models\Wallets\Wallet;
use App\Models\Wallets\WalletTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WalletRepository
{
    /**
     * @var Wallet
     */
    private $wallet;

    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public static function wallet($mobile)
    {
        $wallet = Wallet::where('mobile', $mobile)->first();
        if ($wallet)
            return new self($wallet);

        // if wallet with this mobile not found then create
        return new self(self::create($mobile));

    }

    public static function create($mobile): Wallet
    {
        $wallet = new Wallet();

        $wallet->mobile = $mobile;
        $wallet->save();

        return $wallet;
    }

    public function deposit($amount, $agent, $agent_id)
    {
        DB::connection('mysql_wallet')->beginTransaction();
        try {
            $walletTransaction                 = new WalletTransaction();
            $walletTransaction->amount         = $amount;
            $walletTransaction->operation      = WalletTransaction::OPERATION_INCREASE;
            $walletTransaction->agentable_type = $agent;
            $walletTransaction->agentable_id   = $agent_id;
            $walletTransaction->wallet()->associate($this->wallet);
            $walletTransaction->save();

            $this->wallet->balance += $amount;
            $this->wallet->save();

            DB::connection('mysql_wallet')->commit();
            return Controller::SUCCESS;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());


            DB::connection('mysql_wallet')->rollBack();
            return Controller::SUCCESS_DEPOSIT;
        }
    }

    public function withdraw($amount, $agent, $agent_id)
    {
        DB::connection('mysql_wallet')->beginTransaction();
        try {
            $walletTransaction                 = new WalletTransaction();
            $walletTransaction->amount         = $amount;
            $walletTransaction->operation      = WalletTransaction::OPERATION_DECREASE;
            $walletTransaction->agentable_type = $agent;
            $walletTransaction->agentable_id   = $agent_id;
            $walletTransaction->wallet()->associate($this->wallet);
            $walletTransaction->save();

            $this->wallet->balance -= $amount;
            $this->wallet->save();

            DB::connection('mysql_wallet')->commit();
            return Controller::SUCCESS;
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());


            DB::connection('mysql_wallet')->rollBack();
            return Controller::ERROR_WITHDRAW;
        }
    }

    public function charge() {
        return $this->wallet->balance;
    }
}

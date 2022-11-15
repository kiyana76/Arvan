<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use App\Models\Promotions\Coupon;
use App\Models\Promotions\CouponGroup;
use App\Services\HttpRequests\WalletRequests;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CouponRepository
{

    private $mobile;
    /**
     * @var Coupon
     */
    private $coupon;

    public function __construct(Coupon $coupon, $mobile)
    {
        $this->coupon = $coupon;
        $this->mobile = $mobile;
    }

    public function check()
    {
        // ------------------------------------ CouponGroup Status ------------------------------------
        if ($this->coupon->couponGroup->status != CouponGroup::STATUS_ACTIVE) {
            return Controller::ERROR_COUPON_INACTIVE;
        }

        // ------------------------------------ CouponGroup Time ------------------------------------
        if (Carbon::now()->lt($this->coupon->couponGroup->start_at)) {
            return Controller::ERROR_COUPON_NOT_STARTED;
        }
        if (Carbon::now()->gt($this->coupon->couponGroup->end_at)) {
            return Controller::ERROR_COUPON_NOT_ENDED;
        }

        // ------------------------------------ Check count ------------------------------------
        if ($this->coupon->couponGroup->used_count >= $this->coupon->couponGroup->max_count) {
            return Controller::ERROR_COUPON_MAX_COUNT;
        }

        return Controller::SUCCESS;
    }

    public function apply()
    {
        $effects = (object)$this->coupon->couponGroup->effects;

        if ($effects->{CouponGroup::EFFECT_INCREASE_CREDIT}) {
            $response = WalletRequests::deposit([
                'mobile'   => $this->mobile,
                'amount'   => $effects->{CouponGroup::EFFECT_INCREASE_CREDIT},
                'agent'    => 'App\Models\Promotions\Coupon',
                'agent_id' => $this->coupon->id
            ]);

            if (!$response->success)
                return Controller::ERROR_DEPOSIT_FAILED;

            DB::connection('mysql_promotion')->beginTransaction();
            try {
                $this->coupon->mobile = $this->mobile;
                $this->coupon->couponGroup->used_count++;

                $this->coupon->save();
                $this->coupon->couponGroup->save();

                DB::connection('mysql_promotion')->commit();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                DB::connection('mysql_promotion')->rollBack();

                WalletRequests::withdraw([
                    'mobile'   => $this->mobile,
                    'amount'   => $effects->{CouponGroup::EFFECT_INCREASE_CREDIT},
                    'agent'    => 'App\Models\Promotions\Coupon',
                    'agent_id' => $this->coupon->id
                ]);
                return Controller::ERROR_APPLY_FAILED;
            }
        }

        return Controller::SUCCESS;
    }
}

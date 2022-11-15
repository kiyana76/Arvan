<?php

namespace App\Repositories;

use App\Http\Resources\CouponUsedResource;
use App\Models\Promotions\Coupon;

class CouponReportRepository
{
    public function CouponUsedRepository($filters)
    {
        $coupons = new Coupon();
        $coupons = $coupons->query()
            ->with('CouponGroup')
            ->whereNotNull('mobile');
        if (isset($filters['code']) && $filters['code'] != '')
            $coupons->where('code', 'like', '%' . $filters['code'] . '%');
        if (isset($filters['mobile']) && $filters['mobile'] != '')
            $coupons->where('mobile', $filters['mobile']);

        return CouponUsedResource::collection($coupons->get());

    }
}

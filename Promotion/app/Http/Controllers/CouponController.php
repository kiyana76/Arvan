<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsedCouponListRequest;
use App\Http\Requests\UseRequest;
use App\Models\Promotions\Coupon;
use App\Repositories\CouponReportRepository;
use App\Repositories\CouponRepository;

class CouponController extends Controller
{
    public function use(UseRequest $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        if (!$coupon)
            return self::apiResponse('', 20004);


        $couponRepository = new CouponRepository($coupon, $request->mobile);
        $res              = $couponRepository->check();
        if ($res != self::SUCCESS)
            return self::apiResponse('', $res);

        $res = $couponRepository->apply();
        if ($res != self::SUCCESS)
            return self::apiResponse('', $res);

        return self::apiResponse('', self::SUCCESS_APPLY);
    }

    public function getUsedCouponList(UsedCouponListRequest $request) {
        $filters = [
            'code',
            'mobile'
        ];
        $filters = $request->only($filters);

        $couponReportRepository = new CouponReportRepository();
        $report = $couponReportRepository->CouponUsedRepository($filters);

        return self::apiResponse($report, self::SUCCESS);
    }
}

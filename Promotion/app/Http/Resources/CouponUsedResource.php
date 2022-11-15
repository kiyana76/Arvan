<?php

namespace App\Http\Resources;


use App\Models\Promotions\Coupon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class BankAccountIndexResource
 *
 * @package App\Http\Resources\
 *
 * @mixin Coupon
 */
class CouponUsedResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title'      => $this->CouponGroup->title,
            'used_count' => $this->CouponGroup->used_count,
            'mobile'     => $this->mobile,
            'code'       => $this->code
        ];
    }
}

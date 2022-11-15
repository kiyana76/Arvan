<?php

namespace Database\Factories\Promotions;

use App\Models\Promotions\CouponGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponGroupFactory extends Factory
{
    protected $model = CouponGroup::class;
    public function definition()
    {
         return [
           'title' => 'کد تخفیف بازی ایزان و برزیل',
           'kind' => CouponGroup::KIND_PUBLIC,
           'prefix' => 'WORLDCUP-',
           'length' => 12,
           'unique_length' => 3,
           'max_count' => 1000,
           'used_count' => 0,
           'start_at' => '2022-11-19 00:00:00',
           'end_at' => '2022-11-26 23:59:59',
           'effects' => [
               'increase_credit' => '10000000'
           ],
           'status' => CouponGroup::STATUS_ACTIVE
         ];
    }
}

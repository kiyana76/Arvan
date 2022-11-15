<?php

namespace Database\Factories\Promotions;

use App\Models\Promotions\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;
    public function definition()
    {
         return [
           'code' => 'WORLDCUP-150',
         ];
    }
}

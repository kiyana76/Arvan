<?php

namespace Database\Seeders;

use App\Models\Promotions\Coupon;
use App\Models\Promotions\CouponGroup;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        CouponGroup::factory()
            ->count(1)
            ->has(Coupon::factory()->count(1000))
            ->create();
    }
}

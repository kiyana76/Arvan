<?php

use App\Models\Promotions\CouponGroup;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKindColumnToCouponGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_promotion')->table('coupon_groups', function (Blueprint $table) {
            $table->enum('kind', CouponGroup::KINDS)->after('title')->default(CouponGroup::KIND_PUBLIC);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_promotion')->table('coupon_groups', function (Blueprint $table) {
            $table->dropColumn('kind');
        });
    }
}

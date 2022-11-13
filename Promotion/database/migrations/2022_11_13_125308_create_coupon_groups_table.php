<?php

use App\Models\Promotions\CouponGroup;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_promotion')->create('coupon_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('prefix');
            $table->integer('length');
            $table->integer('unique_length');
            $table->integer('max_count');
            $table->integer('used_count')->default(0);
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->json('effects');
            $table->enum('status', CouponGroup::STATUSES);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_promotion')->dropIfExists('coupon_groups');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_promotion')->create('coupons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('coupon_group_id')->unsigned();
            $table->foreign('coupon_group_id')->references('id')->on('coupon_groups')->onDelete('cascade');
            $table->string('code');
            $table->integer('used_count')->default(0);
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
        Schema::connection('mysql_promotion')->dropIfExists('coupons');
    }
}

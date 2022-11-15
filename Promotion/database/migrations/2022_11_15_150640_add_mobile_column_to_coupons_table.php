<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMobileColumnToCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_promotion')->table('coupons', function (Blueprint $table) {
            $table->dropColumn('used_count');
            $table->string('mobile')->after('used_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_promotion')->table('coupons', function (Blueprint $table) {
            $table->dropColumn('mobile');
        });
    }
}

<?php

use App\Models\Wallets\WalletTransaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_wallet')->create('wallet_transactions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('wallet_id')->unsigned();
            $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('cascade');

            $table->bigInteger('amount')->unsigned();
            $table->enum('operation', WalletTransaction::OPERATION);

            $table->morphs('agentable');

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
        Schema::connection('mysql_wallet')->dropIfExists('wallet_transactions');
    }
}

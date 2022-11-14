<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_method_id')->unsigned();
            $table->foreignId('coin_id')->unsigned();
            $table->foreignId('invoice_id')->unsigned();
            $table->float('exchange')->default(0);
            $table->float('amount');
            $table->foreignId('user_created_id')->unsigned('users');
            $table->foreignId('user_updated_id')->nullable()->unsigned('users');
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
        Schema::dropIfExists('invoice_payments');
    }
};

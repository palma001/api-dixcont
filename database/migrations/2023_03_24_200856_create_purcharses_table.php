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
        Schema::create('purcharses', function (Blueprint $table) {
            $table->id();
            $table->float('exchange_rate')->default(0);
            $table->boolean('status')->default(true);
            $table->foreignId('invoice_type_id')->unsigned();
            $table->foreignId('coin_id')->unsigned();
            $table->foreignId('provider_id')->unsigned('users');
            $table->foreignId('user_created_id')->unsigned('users');
            $table->foreignId('user_updated_id')->nullable()->unsigned('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purcharses');
    }
};

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
        Schema::create('product_purcharse', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->unsigned();
            $table->foreignId('product_id')->unsigned();
            $table->float('amount');
            $table->float('price');
            $table->float('discount')
                ->default(0)
                ->nullable();
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
        Schema::dropIfExists('product_purcharse');
    }
};

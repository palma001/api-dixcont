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
        Schema::create('invoice_type_taxe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('taxe_id')->unsigned();
            $table->foreignId('invoice_type_id')->unsigned();
            $table->float('amount');
            $table->enum('type_taxe', ['percentage', 'fixed_quantity'])->default('percentage');
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
        Schema::dropIfExists('invoice_type_tax');
    }
};

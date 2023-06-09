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
        Schema::create('invoice_table', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->unsigned();
            $table->foreignId('table_id')->unsigned();
            $table->enum('status', ['busy', 'unoccupied'])->default('busy');
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
        Schema::dropIfExists('invoice_table');
    }
};

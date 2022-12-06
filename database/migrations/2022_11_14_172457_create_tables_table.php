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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('y')->nullable();
            $table->integer('x')->nullable();
            $table->integer('width')->default(50)->nullable();
            $table->integer('height')->default(50)->nullable();
            $table->foreignId('living_room_id')->unsigned();
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
        Schema::dropIfExists('tables');
    }
};

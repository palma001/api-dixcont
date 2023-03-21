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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('document_number')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')
                ->nullable()
                ->unsigned();
            $table->foreignId('branch_office_id')
                ->nullable()
                ->unsigned();
            $table->foreignId('document_type_id')
                ->nullable()
                ->unsigned();
            $table->foreignId('user_created_id')->nullable()->unsigned('users');
            $table->foreignId('user_updated_id')->nullable()->unsigned('users');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

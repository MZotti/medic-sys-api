<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('active');
            $table->string('cpf')->unique();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->unsignedBigInteger('state_id')->unsigned()->nullable();
            $table->unsignedBigInteger('city_id')->unsigned()->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->string('address_complement')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softdeletes();
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
}

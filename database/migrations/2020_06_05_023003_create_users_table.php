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
            $table->bigIncrements('id')->unsigned(false);
            $table->string('openid', 128)->nullable();
            $table->string('nickname', 32)->nullable();
            $table->string('avatar')->nullable();
            $table->string('gender', 2)->nullable();
            $table->string('cellphone', 11)->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('lon')->nullable();
            $table->string('lat')->nullable();
            $table->string('version', 32)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

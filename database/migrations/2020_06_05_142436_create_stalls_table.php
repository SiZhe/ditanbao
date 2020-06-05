<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stalls', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned(false);
            $table->bigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name', 64)->nullable();
            $table->string('cover')->nullable();
            $table->text('desc')->nullable();
            $table->text('lon')->nullable();
            $table->text('lat')->nullable();
            $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('stalls');
    }
}

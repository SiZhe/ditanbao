<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAdministratorsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ('administrators', function (Blueprint $table) {
			$table->bigIncrements('id')->unsigned(false);
			$table->string('username', 32)->nullable();
			$table->string('password')->nullable();
			$table->rememberToken();
			$table->timestamps();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists ( 'administrators' );
	}
}

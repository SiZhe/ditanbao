<?php
use Illuminate\Database\Seeder;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

class ImportDefaultData extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Administrator::firstOrCreate([
			'username' => 'admin',
			'password' => Hash::make('123456'),
		]);
	}
}

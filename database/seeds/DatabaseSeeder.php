<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
// use Afreshysoc\Database\seeds\AdminTableSeeder;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('AdminTableSeeder');
		$this->command->info('Admin table seeded');
	}

}
class AdminTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Afreshysoc\Models\Admin::create([
				'username' =>'admin',
				'email' => 'admin@admin.org',
				'password' => Hash::make('password')
			]);
	}

}

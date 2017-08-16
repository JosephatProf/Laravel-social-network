<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Afreshysoc\Models\Admin::create([
				'email' => 'admin@admin.org',
				'password' => Hash::make('password')
			]);
	}

}

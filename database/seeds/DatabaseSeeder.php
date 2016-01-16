<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		//$this->call(UserTableSeeder::class);
		//$this->command->info('User table seeded!');

		$this->call('DeviceTableSeeder');
		$this->command->info('Device table seeded!');

		$this->call('ValueTableSeeder');
		$this->command->info('Value table seeded!');
	}
}
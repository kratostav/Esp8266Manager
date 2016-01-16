<?php

use Illuminate\Database\Seeder;
use App\Device;

class DeviceTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('devices')->delete();

		Device::create(array(
			'MAC' => 'FF:FF:FF:FF:FF:AA',
		));

		DB::table('devices')->insert([
			'MAC' => 'FF:FF:FF:FF:FF:FF',
			'Name' => 'Google Ultron',
		]);
		DB::table('devices')->insert([
			'MAC' => 'FF:FF:FF:FF:FF:AA',
		]);

	}
}
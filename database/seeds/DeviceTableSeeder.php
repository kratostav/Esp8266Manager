<?php

use Illuminate\Database\Seeder;
use App\Device;

class DeviceTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('devices')->delete();

        DB::table('devices')->insert([
            'MAC' => 'FF:FF:FF:FF:FF:FF',
            'Name' => 'Google Ultron',
            'uid' => 1,
        ]);
        DB::table('devices')->insert([
            'MAC' => 'FF:FF:FF:FF:FF:AA',
            'uid' => 1,
        ]);

    }
}
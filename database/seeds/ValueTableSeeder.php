<?php

use Illuminate\Database\Seeder;
use App\Value;

class ValueTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('values')->delete();

        DB::table('values')->insert([
            'temperature' => 100.98,
            'humidity' => 2,
            'did' => 31,
        ]);
        DB::table('values')->insert([
            'temperature' => 10.98,
            'humidity' => 20,
            'did' => 31,
        ]);
        DB::table('values')->insert([
            'temperature' => 0.98,
            'humidity' => 23,
            'did' => 31,
        ]);
    }
}
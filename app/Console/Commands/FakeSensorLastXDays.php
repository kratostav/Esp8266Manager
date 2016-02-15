<?php

namespace App\Console\Commands;

use App\Device;
use App\Value;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FakeSensorLastXDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:fakelastxdays';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';




    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = Carbon::now()->subDays(50)->setTime(0,0,0);
        $this->info($date);
        do {


            $devices = Device::get();
            foreach ($devices as $d) {
                for($i=0;$i<=23;$i++) {

                    $date->setTime($i,0,0);
                    $value = new Value();
                    $value->temperature = mt_rand(0, 100);
                    $value->humidity = mt_rand(0, 100);
                    $value->did = $d->id;
                    $value->setCreatedAt($date);
                    $value->save();
                    $this->info($date.' '.$d->id);
                }

            }
            $date->addDay();
        }while ($date < Carbon::now()->subDays(1)->setTime(0,0,0));
    }


}

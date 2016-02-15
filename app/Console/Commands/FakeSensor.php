<?php

namespace App\Console\Commands;

use App\Device;
use App\Value;
use Illuminate\Console\Command;

class FakeSensor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:fake';

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
        $devices = Device::get();
        foreach($devices as $d)
        {
            $value = new Value();
            $value->temperature = mt_rand(0,100);
            $value->humidity = mt_rand(0,100);
            $value->did = $d->id;
            $value->save();
            $this->info(" ");
            $this->info($d);
            $this->info($value);
            $this->info(" ");
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Value;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AccumulateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:accumulate';

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
        $result = Value::groupBy('did')
            ->groupBy(\DB::raw('DATE(created_at)'))
            ->get([
                \DB::raw('MIN(temperature) as minTemp'),
                \DB::raw('MAX(temperature) as maxTemp'),
                \DB::raw('AVG(temperature) as avgTemp'),

                \DB::raw('MIN(humidity) as minHum'),
                \DB::raw('MAX(humidity) as maxHum'),
                \DB::raw('AVG(humidity) as avgHum'),

                \DB::raw('did'),
                \DB::raw('MAX(created_at) as lastEntry'),
                \DB::raw('DATE(created_at) as date'),
                \DB::raw('count(id)')
                ]);
          //dd($result);

         // $this->info($result);
        foreach($result as $r)
        {
            $this->info($r);
        }

        $this->info("Data Accumulated");
    }
}


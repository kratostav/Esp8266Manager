<?php

namespace App\Console\Commands;

use App\Value;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CleanData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes all values exept values that are not older than 2 days';

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
        //DB::enableQueryLog();


        $date=Carbon::now()->subDay(2);//->setTime(0,0,0);
        $result = Value::where('created_at','<=',$date)->get();
      //  dd($result);
      //  $queries = DB::getQueryLog();
      //  foreach($queries as $q) {
      //      $this->info(end($q));
      //  }
      //  $this->info($result);
      //  $this->info($date);
        $this->info("Database Cleaned");
    }
}

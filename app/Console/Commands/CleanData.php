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

        $this->info("Database Clean started");

        $date=Carbon::now()->subDay(7);
        $this->info($date);

        $result = Value::where('created_at','<=',$date)->get();

        foreach($result as $r)
        {
            $this->info($r);
        }

        $this->info("Database Cleaned");
    }
}

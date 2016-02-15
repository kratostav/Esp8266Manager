<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
        Commands\CleanData::class,
        Commands\AccumulateData::class,
        Commands\AccuCleanSched::class,
        Commands\FakeSensor::class,
        Commands\FakeSensorLastXDays::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('data:scheduled')
            ->dailyAt('23:50')->sendOutputTo(public_path().'/AccuLog.txt');

    }
}

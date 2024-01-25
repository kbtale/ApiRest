<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\CreateDatabase;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands the developer may require (me, lol).
     *
     * @var array
     */
    protected $commands = [
        Commands\CreateDatabase::class,
        Commands\RunMigration::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

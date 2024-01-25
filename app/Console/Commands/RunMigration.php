<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RunMigration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to run the apirestdemo migrations and seeders.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Switch to the new database
        config(['database.connections.mysql.database' => 'apirestdemo']);
        DB::purge('mysql');
        DB::reconnect('mysql');
        $this->info('Connection established with the database.');
        
        // Run the migrations
        $this->call('migrate', ['--force' => true]);
        $this->info('Migrations: Done.');
    
        // Run the database seeder
        $this->call('db:seed', ['--force' => true]);
        $this->info('Seeders: Done. Database creation and setup completed successfully.');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create the apirestdemo database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Create the database
        DB::statement('CREATE DATABASE IF NOT EXISTS apirestdemo');
        $this->info('Database apirestdemo for the POS Restaurant created successfully.');
    }    
}

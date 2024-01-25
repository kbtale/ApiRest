<?php

namespace Database\Seeders;

use App\Models\ServiceTable;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (ServiceTable::count() !== 0) {
            return;
        }
        ServiceTable::create(
            [
                'title' => 'Mesa uno',
            ]
        );
        ServiceTable::create(
            [
                'title' => 'Mesa dos',
            ]
        );
        ServiceTable::create(
            [
                'title' => 'Mesa tres',
            ]
        );
        ServiceTable::create(
            [
                'title' => 'Mesa cuatro',
            ]
        );
    }
}

<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() !== 0) {
            return;
        }
        User::create(
            [
                'name' => 'Carlos Bolívar',
                'email' => 'carlosabolivart@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => 1,
            ]
        );
        User::create(
            [
                'name' => 'Mario',
                'email' => 'mario@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => 2,
            ]
        );
        User::create(
            [
                'name' => 'Pedro',
                'email' => 'chef@gmail.com',
                'password' => bcrypt(12345678),
                'role_id' => 3,
            ]
        );
    }
}

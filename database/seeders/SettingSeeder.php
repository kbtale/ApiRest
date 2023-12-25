<?php
namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Setting::count() !== 0) {
            return;
        }
        Setting::create(
            [
                'app_name' => 'Restaurant POS',
                'app_https' => false,
                'app_url' => config('app.url'),
                'app_phone' => '584127110088',
                'app_date_format' => 'd-m-Y H:s:i',
                'app_address' => 'Maracaibo',
                'mail_from_name' => 'Boilerplate system',
                'mail_from_address' => 'carlosabolivart@gmail.com',
                'mail_mailer' => 'log',
                'mail_host' => '0.0.0.0',
                'mail_username' => null,
                'mail_password' => null,
                'mail_port' => 1025,
                'mail_encryption' => null,
                'tax_rate' => 17,
            ]
        );
    }
}

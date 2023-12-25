<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (PaymentMethod::count() === 0) {
            PaymentMethod::create(
                [
                    'title' => 'Efectivo USD',
                ]
            );
            PaymentMethod::create(
                [
                    'title' => 'Efectivo BS',
                ]
            );
            PaymentMethod::create(
                [
                    'title' => 'Tarjeta',
                ]
            );
            PaymentMethod::create(
                [
                    'title' => 'Pago Móvil',
                ]
            );
            PaymentMethod::create(
                [
                    'title' => 'Zelle',
                ]
            );
            PaymentMethod::create(
                [
                    'title' => 'PayPal',
                ]
            );
        }
    }
}

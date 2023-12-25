<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Ingredient::count() === 0) {
            Ingredient::create(
                [
                    'name' => 'Huevo',
                    'price' => 2,
                    'cost' => 1,
                    'quantity' => 200,
                    'unit' => 'cope',
                    'alert_quantity' => 20,
                ]
            );
            Ingredient::create(
                [
                    'name' => 'Leche',
                    'price' => 3,
                    'cost' => 2,
                    'quantity' => 500,
                    'unit' => 'ltr',
                    'alert_quantity' => 50,
                ]
            );

            Ingredient::create(
                [
                    'name' => 'Carne',
                    'price' => 4,
                    'cost' => 3,
                    'quantity' => 1000,
                    'unit' => 'kg',
                    'alert_quantity' => 70,
                ]
            );
            Ingredient::create(
                [
                    'name' => 'Pollo',
                    'price' => 3,
                    'cost' => 2,
                    'quantity' => 1000,
                    'unit' => 'kg',
                    'alert_quantity' => 70,
                ]
            );
            Ingredient::create(
                [
                    'name' => 'Cebolla',
                    'price' => 2,
                    'cost' => 1,
                    'quantity' => 1000,
                    'unit' => 'kg',
                    'alert_quantity' => 3,
                ]
            );
            Ingredient::create(
                [
                    'name' => 'Papas',
                    'price' => 2,
                    'cost' => 1,
                    'quantity' => 10000,
                    'unit' => 'kg',
                    'alert_quantity' => 50,
                ]
            );
            Ingredient::create(
                [
                    'name' => 'Pan',
                    'price' => 1,
                    'cost' => 1,
                    'quantity' => 5000,
                    'unit' => 'piece',
                    'alert_quantity' => 10,
                ]
            );
            Ingredient::create(
                [
                    'name' => 'Ketchup',
                    'price' => 1,
                    'cost' => 1,
                    'quantity' => 7000,
                    'unit' => 'pack',
                    'alert_quantity' => 100,
                ]
            );
        }
    }
}

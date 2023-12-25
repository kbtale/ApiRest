<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (FoodCategory::count() === 0) {
            FoodCategory::create(
                [
                    'name' => 'Italiana',
                ]
            );
            FoodCategory::create(
                [
                    'name' => 'FastFood',
                ]
            );

            FoodCategory::create(
                [
                    'name' => 'China',
                ]
            );
            FoodCategory::create(
                [
                    'name' => 'Venezolana',
                ]
            );
            FoodCategory::create(
                [
                    'name' => 'Bebidas',
                ]
            );
        }
    }
}

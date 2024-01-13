<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

$faker = Faker::create('es_VE');
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$uuid = $this->faker->randomElement(['V','E']) . $this->faker->numberBetween(1000000,33000000);
        return [
            'uuid' => Str::orderedUuid(),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->streetAddress(),
            'partner' => $this->faker->boolean(),
            'creditLimit' => $this->faker->numberBetween(15, 40),
        ];
    }
}

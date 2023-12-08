<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PlayerFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'first_name' => fake()->firstNameMale(),
            'last_name' => fake()->lastName(),
            'level' => fake()->numberBetween(1, 5),
            'is_goalkeeper' => false,
            'phone' => fake()->phoneNumber(),

        ];
    }


}

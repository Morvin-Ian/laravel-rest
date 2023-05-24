<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::where('id', 1)->first();
        return [
            'title' => $this->faker->words(5, true),
            'description' => $this->faker->sentence(45),
            'author'=> $user->id
        ];
    }
}

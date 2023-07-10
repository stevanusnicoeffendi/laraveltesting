<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubmitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'caption' => $this->faker->paragraph,
        ];
    }
}

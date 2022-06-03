<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'created_at' => Carbon::now(),
            'created_by' => 'Admin',
        ];
    }
}

<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->text(),
            'image' => $this->faker->url(),
            'user_id' => $this->faker->numberBetween(1, User::count()),
            'category_id' => $this->faker->numberBetween(1, Categories::count()),
            'created_at' => Carbon::now(),
            'created_by' => 'Admin',
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ForumPost;
use App\Models\User;
use App\Models\Category;

class ForumPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'   => $this->faker->sentence,
            'body'    => $this->faker->paragraph(30),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}

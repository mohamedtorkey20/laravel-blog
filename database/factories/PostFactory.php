<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title'=>fake()->unique()->text(20),
        'body'=>'This is the body of sample post',
        'enabled' => true,
         'published_at'=> now(),
         'user_id' => function () {
            return User::factory()->create()->id;
        },
        ];

     }

}

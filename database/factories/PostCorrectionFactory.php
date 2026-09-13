<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCorrection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PostCorrection>
 */
class PostCorrectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'reason' => fake()->sentence(),
            'previous_content_hash' => fake()->sha256(),
            'corrected_content_hash' => fake()->sha256(),
            'corrected_at' => now(),
        ];
    }
}

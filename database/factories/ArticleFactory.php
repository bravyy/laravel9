<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $body = collect($this->faker->paragraphs(rand(3, 12)))
            ->map(function($item){
                return "<p>$item</p>";
            })->toArray();

        $body = implode($body);

        return [
            'user_id' => 1,
            'title' => $title,
            'description' => $this->faker->paragraph,
            'slug' => Str::slug($title),
            'body' => $body,
        ];
    }
}

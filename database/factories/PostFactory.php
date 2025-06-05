<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\Tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(20),
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'likes' => random_int(1, 2000),
            'published' => 1,
            'category_id' => Category::get()->random()->id,
        ];
    }
    public function withTags($count = 3)
    {
        return $this->afterCreating(function (Post $post) use ($count) {
            // Выбираем случайные существующие теги
            $tags = Tag::inRandomOrder()->take($count)->get();
            // Прикрепляем теги к посту
            $post->tags()->attach($tags->pluck('id'));
        });
    }
}

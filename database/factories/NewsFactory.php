<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => Str::of('Laravel Framework')->slug('-'),
            'author' => $this->faker->name(),
            'image' => '/img/placeholder/document.jpg',
            'excerpt' => $this->faker->paragraph(5),
            'body' => $this->faker->paragraphs(10, true),
        ];
    }
}

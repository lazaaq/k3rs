<?php

namespace Database\Factories;

use App\Models\Regulasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegulasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Regulasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'file' => $this->faker->slug(),
        ];
    }
}

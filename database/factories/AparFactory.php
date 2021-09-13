<?php

namespace Database\Factories;

use App\Models\Apar;
use Illuminate\Database\Eloquent\Factories\Factory;

class AparFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => '/img/placeholder/document.jpg',
            'time' => $this->faker->date(),
            'location' => $this->faker->sentence(),
            'code' => $this->faker->randomElement(['a', 'b', 'c', 'd', 'e', 'f', 'g']),
            'expired' => $this->faker->date(),
            'condition' => $this->faker->randomElement(['baik', 'tidak baik']),
            'detail' => $this->faker->paragraph(3),
        ];
    }
}

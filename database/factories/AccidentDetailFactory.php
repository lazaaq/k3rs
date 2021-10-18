<?php

namespace Database\Factories;

use App\Models\Accident;
use App\Models\AccidentDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccidentDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccidentDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'accident_id' => mt_rand(1, Accident::all()->count()),
            'chronology' => $this->faker->text(),
            'faskes' => $this->faker->sentence(),
            'effect' => $this->faker->sentence(),
            'condition' => $this->faker->randomElement(['inap', 'jalan']),
        ];
    }
}

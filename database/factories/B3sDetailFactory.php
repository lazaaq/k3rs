<?php

namespace Database\Factories;

use App\Models\B3s;
use App\Models\B3sDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class B3sDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = B3sDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'b3s_id' => mt_rand(1, B3s::all()->count()),
            'human' => $this->faker->text(),
            'wash' => $this->faker->randomElement(['ya','tidak']),
            'injury' => $this->faker->randomElement(['ya','tidak']),
            'tool' => $this->faker->sentence(),
            'effect' => $this->faker->sentence(),
            'follow_up' => $this->faker->text(),
            
        ];
    }
}

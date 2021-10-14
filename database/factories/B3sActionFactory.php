<?php

namespace Database\Factories;

use App\Models\B3s;
use App\Models\B3sAction;
use Illuminate\Database\Eloquent\Factories\Factory;

class B3sActionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = B3sAction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'b3s_id' => mt_rand(1, B3s::all()->count()),
            'supervisor_room' => $this->faker->randomElement(['ya', 'tidak']),
            'supervisor_sanitasi' => $this->faker->randomElement(['ya', 'tidak']),
            'eliminate' => $this->faker->randomElement(['ya', 'tidak']),
            'glove' => $this->faker->randomElement(['ya', 'tidak']),
            'waste' => $this->faker->randomElement(['ya', 'tidak']),
        ];
    }
}

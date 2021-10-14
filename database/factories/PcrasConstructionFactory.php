<?php

namespace Database\Factories;

use App\Models\Pcras;
use App\Models\PcrasConstruction;
use Illuminate\Database\Eloquent\Factories\Factory;

class PcrasConstructionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PcrasConstruction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pcras_id' => mt_rand(1, Pcras::all()->count()),
            'dust' => $this->faker->randomElement(['ya', 'tidak', 'lainnya']),
            'barrier' => $this->faker->randomElement(['ya', 'tidak', 'lainnya']),
            'door_access' => $this->faker->randomElement(['ya', 'tidak', 'lainnya']),
            'dusty_area' => $this->faker->randomElement(['ya', 'tidak', 'lainnya']),
            'sign_door' => $this->faker->randomElement(['ya', 'tidak', 'lainnya']),
            'vent' => $this->faker->randomElement(['ya', 'tidak', 'lainnya']),
            'comment' => $this->faker->text(),
            
        ];
    }
}

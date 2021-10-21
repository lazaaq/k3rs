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
            'dust' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'barrier' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'door_access' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'dusty_area' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'sign_door' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'vent' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'comment' => $this->faker->text(),
            
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Pcras;
use App\Models\PcrasAccessArea;
use Illuminate\Database\Eloquent\Factories\Factory;

class PcrasAccessAreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PcrasAccessArea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pcras_id' => mt_rand(1, Pcras::all()->count()),
            'plafon' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'floor_clean' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'wall' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'floor_dustfree' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'vent' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'insect' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'comment' => $this->faker->text(),

        ];
    }
}

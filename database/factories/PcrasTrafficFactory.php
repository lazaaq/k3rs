<?php

namespace Database\Factories;

use App\Models\Pcras;
use App\Models\PcrasTraffic;
use Illuminate\Database\Eloquent\Factories\Factory;

class PcrasTrafficFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PcrasTraffic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pcras_id' => mt_rand(1, Pcras::all()->count()),
            'barrier' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'remove_puing' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'route' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'access' => $this->faker->randomElement(['ada', 'tidak', 'lainnya']),
            'comment' => $this->faker->text(),
            
        ];
    }
}

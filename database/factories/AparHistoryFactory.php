<?php

namespace Database\Factories;

use App\Models\Apar;
use App\Models\AparHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class AparHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AparHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'apar_id' => mt_rand(1, Apar::all()->count()),
            'condition' => $this->faker->randomElement(['baik', 'tidak baik']),
            'detail' => $this->faker->sentence(7),
            
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\AccidentVictimNonEmployee;
use App\Models\Accident;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccidentVictimNonEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccidentVictimNonEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'accident_id' => mt_rand(1, Accident::all()->count()),
            'name' => $this->faker->name(),
            'birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'address' => $this->faker->paragraphs(2, true),
            'job' => $this->faker->sentence(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Accident;
use App\Models\AccidentWitnessNonEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;


class AccidentWitnessNonEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccidentWitnessNonEmployee::class;

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
            'nik' => '1234567890123456',
            'gender' => $this->faker->randomElement(['L', 'P']),
            'address' => $this->faker->paragraphs(2, true),
            'job' => $this->faker->sentence(),
        ];
    }
}

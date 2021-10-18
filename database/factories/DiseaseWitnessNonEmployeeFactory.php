<?php

namespace Database\Factories;

use App\Models\Disease;
use App\Models\DiseaseWitnessNonEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiseaseWitnessNonEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiseaseWitnessNonEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'disease_id' => mt_rand(1, Disease::all()->count()),
            'name' => $this->faker->name(),
            'birth' => $this->faker->date(),
            'nik' => '1234567890123456',
            'gender' => $this->faker->randomElement(['L', 'P']),
            'address' => $this->faker->paragraphs(2, true),
            'job' => $this->faker->sentence(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}

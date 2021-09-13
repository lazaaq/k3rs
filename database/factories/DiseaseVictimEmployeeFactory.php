<?php

namespace Database\Factories;

use App\Models\Disease;
use App\Models\DiseaseVictimEmployee;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiseaseVictimEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiseaseVictimEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'disease_id' => mt_rand(1, Disease::all()->count()),
            'employee_id' => mt_rand(1, Employee::all()->count()),
            'salary_range' => $this->faker->randomElement(['day', 'month', 'wholesale']),
            'chronology' => $this->faker->paragraphs(3, true),
            'first_aid' => $this->faker->sentence(),
            'effect' => $this->faker->sentence(),
            'condition' => $this->faker->randomElement(['inap', 'jalan']),
        ];
    }
}

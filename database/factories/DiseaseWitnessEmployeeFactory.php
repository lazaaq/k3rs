<?php

namespace Database\Factories;

use App\Models\Disease;
use App\Models\Employee;
use App\Models\DiseaseWitnessEmployee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DIseaseWitnessEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiseaseWitnessEmployee::class;

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
        ];
    }
}

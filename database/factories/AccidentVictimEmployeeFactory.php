<?php

namespace Database\Factories;

use App\Models\Accident;
use App\Models\AccidentVictimEmployee;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccidentVictimEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccidentVictimEmployee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'accident_id' => mt_rand(1, Accident::all()->count()),
            'employee_id' => mt_rand(1, Employee::all()->count()),
        ];
    }
}

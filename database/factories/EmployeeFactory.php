<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'manager_id' => mt_rand(1,10),
            'salary_id' => mt_rand(1,5),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => Hash::make('password'),
            'address' => $this->faker->paragraph(3),
            'birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['L', 'P']),
        ];
    }
}

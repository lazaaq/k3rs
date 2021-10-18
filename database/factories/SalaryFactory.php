<?php

namespace Database\Factories;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day' => $this->faker->randomNumber(7, true),
            'month' => $this->faker->randomNumber(7, true),
            'wholesale' => $this->faker->randomNumber(7, true),
        ];
    }
}

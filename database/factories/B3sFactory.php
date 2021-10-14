<?php

namespace Database\Factories;

use App\Models\B3s;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class B3sFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = B3s::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => mt_rand(1, Employee::all()->count()),
            'location' => $this->faker->sentence(),
            'datetime' => $this->faker->dateTime(),
            'type' => $this->faker->sentence(),
            'chronology' => $this->faker->text(),

        ];
    }
}

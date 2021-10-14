<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Pcras;
use Illuminate\Database\Eloquent\Factories\Factory;

class PcrasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pcras::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => mt_rand(1, Employee::all()->count()),
            'name' => $this->faker->name(),
            'location' => $this->faker->sentence(),
            'surveyor' => $this->faker->name(),
            'time_start' => $this->faker->dateTime(),
            'time_end' => $this->faker->dateTime(),
            'dept' => $this->faker->name(),
            'plan' => $this->faker->randomElement(['ya', 'tidak', 'lainnya']),
            'apd' => $this->faker->randomElement(['ya', 'tidak', 'lainnya']),
            'warning' => $this->faker->randomElement(['ya', 'tidak', 'lainnya']),
        ];
    }
}

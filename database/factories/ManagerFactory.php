<?php

namespace Database\Factories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manager::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'salary_id' => mt_rand(1,5),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),
            'address' => $this->faker->paragraph(3),
            'birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'telp' => $this->faker->phoneNumber()
        ];
    }
}

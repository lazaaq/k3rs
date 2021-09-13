<?php

namespace Database\Factories;

use App\Models\Disease;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiseaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Disease::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => mt_rand(1, Employee::all()->count()),
            'time' => $this->faker->date(),
            'location' => $this->faker->sentence(),
            'image' => '/img/placeholder/document.jpg',
        ];
    }
}

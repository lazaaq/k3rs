<?php

namespace Database\Factories;

use App\Models\Pcras;
use App\Models\PcrasDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class PcrasDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PcrasDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pcras_id' => mt_rand(1, Pcras::all()->count()),
            'not_eligible' => $this->faker->text(),
            'reported' => $this->faker->sentence(),
            'reporting_date' => $this->faker->date(),
            're_survey_date' => $this->faker->date(),
            'surveyor' => $this->faker->sentence(),
            'accordance' => $this->faker->randomElement(['ada', 'tidak']),
            'further_action' => $this->faker->text(),
            
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Briefing;
use Illuminate\Database\Eloquent\Factories\Factory;

class BriefingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Briefing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'time' => $this->faker->date(),
            'result' => $this->faker->paragraphs(5, true),
        ];
    }
}

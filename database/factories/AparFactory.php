<?php

namespace Database\Factories;

use App\Models\Apar;
use Illuminate\Database\Eloquent\Factories\Factory;

class AparFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $code = $this->faker->randomLetter() . $this->faker->randomDigit();
        return [
            'time' => $this->faker->date(),
            'location' => $this->faker->sentence(),
            'code' => $code,
            'expired' => $this->faker->date(),
        ];
    }
}

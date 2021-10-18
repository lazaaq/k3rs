<?php

namespace Database\Factories;

use App\Models\Disease;
use App\Models\DiseaseDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiseaseDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DiseaseDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'disease_id' => mt_rand(1, Disease::all()->count()),
            'chronology' => $this->faker->text(),
            'faskes' => $this->faker->sentence(),
            'cause' => $this->faker->sentence(),
            'effect' => $this->faker->randomElement(['patah tulang', 'covid', 'serangan jantung', 'lainnya']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Pcras;
use App\Models\PcrasDocumentation;
use Illuminate\Database\Eloquent\Factories\Factory;

class PcrasDocumentationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PcrasDocumentation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pcras_id' => mt_rand(1, Pcras::all()->count()),
            'image' => $this->faker->sentence(),
            'keterangan' => $this->faker->text(),
            
        ];
    }
}

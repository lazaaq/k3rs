<?php

namespace Database\Factories;

use App\Models\BriefingPresence;
use Illuminate\Database\Eloquent\Factories\Factory;

class BriefingPresenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BriefingPresence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'briefing_id' => mt_rand(1, 5),
            // 'employee_id' => mt_rand(1, 10),
            'presence' => mt_rand(0, 1),

        ];
    }
}

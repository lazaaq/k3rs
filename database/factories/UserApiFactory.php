<?php

namespace Database\Factories;

use App\Models\UserApi;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserApiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserApi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email(),
            'password' => 'admin'
        ];
    }
}

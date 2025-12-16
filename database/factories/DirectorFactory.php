<?php

namespace Database\Factories;

use App\Models\Director;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorFactory extends Factory
{
    protected $model = Director::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'bio' => $this->faker->paragraph(),
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['férfi','nő','egyéb']),
        ];
    }
}

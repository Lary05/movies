<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Director;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    protected $model = Movie::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'director_id' => Director::factory(), // új director-t hoz létre, ha nincs
            'category_id' => Category::factory(), // új category-t hoz létre, ha nincs
        ];
    }
}

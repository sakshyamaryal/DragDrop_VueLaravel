<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Task;
use App\Models\Category;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $model = Task::class;

        return [
            //
            'title' => $this->faker->sentence,
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}

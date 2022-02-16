<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project_progress>
 */
class Project_progressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' =>  $this->faker->numberBetween(1, 20),
            'date' =>  $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            'title' => $this->faker->realText(10),
            'description' => $this->faker->realText(30),
        ];
    }
}
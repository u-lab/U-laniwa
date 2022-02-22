<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'representative_id' => $this->faker->numberBetween(1, 10),
            'title' =>   $this->faker->realText(15),
            'subtitle' =>   $this->faker->realText(30),
            'description' => $this->faker->sentence(),
            'place_of_activity' => $this->faker->city(),
            'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
        ];
    }
}
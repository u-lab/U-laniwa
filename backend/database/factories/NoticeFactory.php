<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notice>
 */
class NoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'genre' =>    $this->faker->numberBetween(1, 2),
            'date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            'title' => "「" . $this->faker->realText($this->faker->numberBetween(10, 15)) . "」について",
            'description' => $this->faker->realText(60) . "です。",
        ];
    }
}
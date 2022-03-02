<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectProgress>
 */
class ProjectProgressFactory extends Factory
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
            'title' => $this->faker->randomElement(["新機能", "新しいメンバー", "イベント"]) . $this->faker->randomElement(["を実装しました", "がニュースに載りました", "が参加しました", "を開きます"]),
            'description' => $this->faker->realText(30) . "ということです",
        ];
    }
}
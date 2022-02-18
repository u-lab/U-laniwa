<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserTimeline>
 */
class UserTimelineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //説明ありとなし、終了日なしの3種類用意
        $user_belonged = [
            [
                'user_id' => $this->faker->numberBetween(1, 40),
                'title' =>  $this->faker->word() . "部",
                'description' => $this->faker->realText(20),
                'genre' => $this->faker->numberBetween(1, 4),
                'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
                'end_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            ],
            [
                'user_id' => $this->faker->numberBetween(1, 40),
                'title' =>  $this->faker->word() . "部",
                'description' => $this->faker->realText(20),
                'genre' => $this->faker->numberBetween(1, 4),
                'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),

            ],
            [
                'user_id' => $this->faker->numberBetween(1, 40),
                'title' =>  $this->faker->word() . "部",
                'genre' => $this->faker->numberBetween(1, 4),
                'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),

            ],
        ];
        //説明ありとなし、終了日なしユーザーリンクをランダムに返す
        return  $user_belonged[$this->faker->randomElement([0, 1, 2])];
    }
}
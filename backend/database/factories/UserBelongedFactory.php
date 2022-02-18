<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserBelongedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //説明ありとなし、終了日なしの3種類用意
        $UserBelonged = [
            [
                'user_id' => 1,
                'name' =>  $this->faker->word() . "部",
                'description' => $this->faker->realText(20),
                'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
                'end_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            ],
            [
                'user_id' => 1,
                'name' =>  $this->faker->word() . "部",
                'description' => $this->faker->realText(20),
                'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),

            ],
            [
                'user_id' => 1,
                'name' =>  $this->faker->word() . "部",
                'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),

            ],
        ];
        //説明ありとなし、終了日なしユーザーリンクをランダムに返す
        return  $UserBelonged[$this->faker->randomElement([0, 1, 2])];
    }
}

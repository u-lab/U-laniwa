<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_qualification>
 */
class User_qualificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //説明ありとなしの2種類用意
        $user_qualification = [
            [
                'user_id' => $this->faker->numberBetween(1, 40),
                'name' =>  $this->faker->word() . "検定",
                'description' => $this->faker->realText(20),
                'date_of_acquisition' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            ],
            [
                'user_id' => $this->faker->numberBetween(1, 40),
                'name' =>  $this->faker->word() . "検定",
                'date_of_acquisition' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            ],
        ];
        //説明なしかありのユーザーリンクをランダムに返す
        return  $user_qualification[$this->faker->randomElement([0, 1])];
    }
}
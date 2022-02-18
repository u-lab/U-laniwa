<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserLink>
 */
class UserLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //説明ありとなしの2種類用意
        $UserLink = [
            [
                'user_id' => $this->faker->numberBetween(1, 40),
                'url' =>  $this->faker->url(),
                'name' => $this->faker->word() . "のサイト",
                'description' => $this->faker->realText(20),
            ],
            [
                'user_id' => $this->faker->numberBetween(1, 40),
                'url' =>  $this->faker->url(),
                'name' => $this->faker->word() . "のサイト",
                // 'description' => $this->faker->realText(20),
            ],
        ];
        //説明なしかありのユーザーリンクをランダムに返す
        return  $UserLink[$this->faker->randomElement([0, 1])];
    }
}

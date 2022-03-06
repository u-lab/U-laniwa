<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_link>
 */
class UserLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        //SNSの正しいリンク発行用(favicon検証で用いる)
        $sns = $this->faker->randomElement([["Twitter", "https://twitter.com"], ["Facebook", "https://www.facebook.com"], ["Instagram", "https://www.instagram.com"], ["YouTube", "https://youtube.com"], ["Misskey", "https://misskey.io"], ["mixi", "https://mixi.jp"]]);

        //説明ありとなしの2種類用意
        $userLink = [
            [
                'user_id' => $this->faker->numberBetween(2, 40),
                'url' =>  $this->faker->url(),
                'title' => $this->faker->company() . "のサイト",
                'description' => $this->faker->city() . "にある企業で" . $this->faker->randomElement(["インターン", "バイト"]) . "でお世話になりました。",
            ],
            [
                'user_id' => $this->faker->numberBetween(2, 40),
                'url' =>  $sns[1],
                'title' => $sns[0],
                // 'description' => $this->faker->realText(20),
            ],
        ];
        //説明なしかありのユーザーリンクをランダムに返す
        return  $userLink[$this->faker->randomElement([0, 1])];
    }
}
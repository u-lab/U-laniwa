<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //宇大生
        $udai = $this->faker->randomElement([true, false]);
        $universityInfo = $udai ? [
            'faculty_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]),
            'major_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]),
        ]
            : [

                'university_meta' => json_encode(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5]),
            ];

        return array_merge($universityInfo, [
            // 'user_id' => $this->faker->numberBetween(1, 40),
            'birth_day' => $this->faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'description' => $this->faker->realText(),
            'grade' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]),
            'is_udai' => $udai,
            //宇大かそうでないかの出し分けは上記の配列結合で対応
            'gender' => $this->faker->randomElement([1, 2, 3,]),
            'lived_country_id' => 1,
            'lived_prefecture_id' => 1,
            'lived_municipality_id' => 1,
            'birth_country_id' => 1,
            'birth_prefecture_id' => 1,
            'birth_municipality_id' => 1,
            'is_dark_mode' => $this->faker->randomElement([true, false]),
            'is_publish_birth_day' => $this->faker->randomElement([true, false]),
            'is_graduate' => $this->faker->randomElement([true, false]),
            'status' => $this->faker->realText(15),
            'github_id' => $this->faker->slug(),
            'line_name' => $this->faker->word(),
            'slack_name' => $this->faker->word(),
            'discord_name' => $this->faker->word(),
            'hobbies' => $this->faker->realText(30),
            'interests' => $this->faker->realText(30),
            'languages' => $this->faker->realText(30),
            'motto' => $this->faker->realText(30),
        ]);
    }
}
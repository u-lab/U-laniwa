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

        //宇大生か他大生
        $udai = $this->faker->randomElement([true, false]);
        \Log::debug($udai);
        $universityInfo1 = $udai ? [
            'u_u_major_id' => $this->faker->numberBetween(1, 21),
        ]
            : [

                'university_meta' => json_encode(['university' => "XX大学", 'faculty' => "工学部", 'major' => "電子情報工学科",]),
            ];
        //社会人か？
        $grade = $this->faker->numberBetween(1, 11);
        $universityInfo2 = $grade >= 10 ? [
            'grade' => $grade,
        ]
            : [
                'grade' => $grade,
                'company_meta' => json_encode(['company_name' => "XX株式会社", 'position' => "珈琲エンジニア",]),
            ];

        return array_merge($universityInfo1, $universityInfo2, [
            // 'user_id' => $this->faker->numberBetween(1, 40),
            'birth_day' => $this->faker->dateTimeBetween('-80 years', '-18years')->format('Y-m-d'),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'description' => $this->faker->realText(),
            'is_udai' => $udai,
            //宇大かそうでないかの出し分けは上記の配列結合で対応
            'gender' => $this->faker->numberBetween(1, 3),
            'live_area_id' => $this->faker->numberBetween(1, 1923),
            'birth_area_id' => $this->faker->numberBetween(1, 1923),
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
            'motto' => $this->faker->realText(30),
        ]);
    }
}
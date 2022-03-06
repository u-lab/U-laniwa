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
        $grade = $this->faker->numberBetween(1, 11);
        /**
         * 社会人かそうでないかの分岐
         */
        if ($grade >= 10) {
            $universityInfo =  [
                'grade' => $grade,
                'company_meta' => json_encode(['company_name' => "XX株式会社", 'position' => "珈琲エンジニア",]),
            ];
        } else {
            $udai = $this->faker->randomElement([true, false]);
            /**
             * 宇大生かそうでないかの分岐
             */
            if ($udai) {
                $universityInfo = [
                    'grade' => $grade,
                    'u_u_major_id' => $this->faker->numberBetween(1, 47),
                ];
            } else {
                $universityInfo = [
                    'grade' => $grade,
                    'university_meta' => json_encode(['university' =>  $this->faker->randomElement(["XX", "YYYYY", "ZZZZZZ"]) . "大学", 'faculty' =>  $this->faker->randomElement(["XX", "Y", "ZZZZZ"]) . "学部", 'major' =>  $this->faker->randomElement(["XXX", "YY", "ZZZZZZZZ"]) . "学科",]),
                ];
            }
        }
        /**
         * nullableなものを生成したり生成しなかったりするフィールド
         * @var array[]
         */
        $nullableElements = [
            [
                'group_affiliation' => $this->faker->randomElement(["硬式テニス", 'ESS', 'Resource Network', 'フライングディスク', '宇都宮大学TRPG同好会']),
                'status' =>     $this->faker->city() . "に" . $this->faker->randomElement(["行きたい", "住みたい", "に行ってきました", "別荘がほしい", "思い入れがあります。"]),
                'github_id' => $this->faker->word(),
                'line_name' => $this->faker->word(),
                'slack_name' => $this->faker->word(),
                'discord_name' => $this->faker->word(),
                'hobbies' => $this->faker->name('male') . "の" . $this->faker->randomElement(["映画", "イラスト", "アニメ", "小説", "マンガ"]) . "が好きです",
                'interests' =>     $this->faker->country() . "について調べること。",
                'motto' => $this->faker->randomElement(["コーヒー", "お酒", "紅茶", "お水", "牛乳", "お酒"]) . "は" . $this->faker->randomElement(["ご飯のあと", "剣よりも強し", "正義"]),
            ],
            [],
        ];

        return array_merge($nullableElements[$this->faker->numberBetween(0, 1)], $universityInfo, [
            'description' => $this->faker->realText(),
            'birth_day' => $this->faker->dateTimeBetween('-80 years', '-18years')->format('Y-m-d'),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'gender' => $this->faker->numberBetween(1, 3),
            'live_area_id' => $this->faker->numberBetween(1, 1923),
            'birth_area_id' => $this->faker->numberBetween(1, 1923),
            'is_dark_mode' => $this->faker->randomElement([true, false]),
            'is_publish_birth_day' => $this->faker->randomElement([true, false]),
        ]);
    }
}

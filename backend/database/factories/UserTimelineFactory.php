<?php

namespace Database\Factories;

use Carbon\Carbon;
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
        /**
         * 終了日が開始日より遅くなるようにCarbonを用いる
         */
        $carbon1 = new Carbon('2016-01-01');
        $startDate = $carbon1->addMonths($this->faker->numberBetween(1, 36))->format('Y-m-d');
        $carbon2 = new Carbon('2021-01-01');
        $endDate = $carbon2->addMonths($this->faker->numberBetween(1, 12))->format('Y-m-d');
        $city = $this->faker->city();
        $company = $this->faker->company();
        $workType = $this->faker->randomElement(["アルバイト", "インターン", "勤務"]);
        $qualification = $this->faker->word();
        $qualificationType = $this->faker->randomElement(["習得", "合格", "合格見込"]);
        $group_affiliationType = $this->faker->randomElement(["応援チーム", "を見守る会", "サッカーチーム", "野球チーム"]);
        $group_affiliationPosition = $this->faker->randomElement(["リーダー", "代表", "チームリーダー", ""]);
        $contestType = $this->faker->randomElement(["コンテスト", "大会", "総体", "ハッカソン"]);
        $contestResult = $this->faker->randomElement(["優勝", "準優勝", "予選敗退"]);
        /**
         * ジャンルごとに適した内容に変更することでデータのとっちらかり防ぐ
         */
        $perGenre = [
            [
                'genre' => 1,
                'title' =>  $city . "立高校卒業",
                'description' => $city . "立高校卒業を卒業しました",
                'start_date' => $startDate,
            ],
            [
                'genre' => 1,
                'title' =>  $city . "立高校卒業",
                'start_date' => $startDate,
            ],
            [
                'genre' => 2,
                'title' =>  $company . $workType,
                'description' => $city . "にある" . $company . "で" . $workType . "しました",
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            [
                'genre' => 2,
                'title' =>  $company . $workType,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            [
                'genre' => 2,
                'title' =>  $company . $workType,
                'description' => $city . "にある" . $company . "で" . $workType . "しています",
                'start_date' => $startDate,
            ],
            [
                'genre' => 2,
                'title' =>  $company . $workType,
                'start_date' => $startDate,
            ],
            [
                'genre' => 3,
                'title' =>  $qualification . "資格" . $qualificationType,
                'description' => $qualification . "資格を" . $qualificationType . "しました",
                'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            ],
            [
                'genre' => 3,
                'title' =>  $qualification . "資格" . $qualificationType,
                'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            ],
            [
                'genre' => 4,
                'title' =>  $city . $group_affiliationType . "所属",
                'description' => $city . "に拠点を置く団体で" . $group_affiliationPosition . "を務めました",
                'start_date' => $startDate,
            ],
            [
                'genre' => 4,
                'title' =>  $city . $group_affiliationType . "所属",
                'start_date' => $startDate,
            ],
            [
                'genre' => 4,
                'title' =>  $company . $workType,
                'title' =>  $city . $group_affiliationType . "所属",
                'description' => $city . "に拠点を置く団体で" . $group_affiliationPosition . "を務めました",
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            [
                'genre' => 4,
                'title' =>  $company . $workType,
                'title' =>  $city . $group_affiliationType . "所属",
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
            [
                'genre' => 5,
                'title' =>  $city . $contestType,
                'description' => $city . "で行われた" . $contestType . "で" . $contestResult . "しました",
                'start_date' => $startDate,
            ],
            [
                'genre' => 5,
                'title' =>  $city . $contestType,
                'start_date' => $startDate,
            ],
        ];

        //説明ありとなし、終了日なしユーザーリンクをランダムに返す
        return  array_merge(
            [
                'user_id' => $this->faker->numberBetween(1, 40),
            ],
            $perGenre[$this->faker->numberBetween(0, 13)]
        );
    }
}
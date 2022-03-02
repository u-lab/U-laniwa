<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $carbon1 = new Carbon('2016-01-01');
        $startDate = $carbon1->addMonths($this->faker->numberBetween(1, 36))->format('Y-m-d');
        $carbon2 = new Carbon('2021-01-01');
        $endDate = $carbon2->addMonths($this->faker->numberBetween(1, 12))->format('Y-m-d');

        $city = $this->faker->city(15);
        $type = $this->faker->randomElement(["に建物", "のwebサイト", "の名産品", "の観光名所"]);
        $action = $this->faker->randomElement(["作る", "守る", "用意する", "宣伝する"]);
        return [
            'representative_id' => $this->faker->numberBetween(1, 10),
            'title' =>   $city . $type . "を" . $action,
            'subtitle' =>    $city . "協賛プロジェクト",
            'description' => $city . $type . "を" . $action . "プロジェクトです。" . $this->faker->realText(50) . "です。",
            'place_of_activity' => $this->faker->secondaryAddress(),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}
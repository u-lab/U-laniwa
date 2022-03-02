<?php

namespace Database\Factories;

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
        $city = $this->faker->city(15);
        $type = $this->faker->randomElement(["に建物", "のwebサイト", "の名産品", "の観光名所"]);
        $action = $this->faker->randomElement(["作る", "守る", "用意する", "宣伝する"]);
        return [
            'representative_id' => $this->faker->numberBetween(1, 10),
            'title' =>   $city . $type . "を" . $action,
            'subtitle' =>    $city . "協賛プロジェクト",
            'description' => $city . $type . "を" . $action . "プロジェクトです。" . $this->faker->realText(50) . "です。",
            'place_of_activity' => $this->faker->secondaryAddress(),
            'start_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
        ];
    }
}
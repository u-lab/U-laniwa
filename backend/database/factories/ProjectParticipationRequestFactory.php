<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectParticipationRequest>
 */
class ProjectParticipationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => $this->faker->numberBetween(1, 20),
            'user_id' => $this->faker->numberBetween(1, 40),
            'comment' => $this->faker->name() . "です。" . $this->faker->name('male') . "の紹介で興味を持ちました。よろしくお願いいたします。",
        ];
    }
}
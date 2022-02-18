<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'name' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'birth_day' => $this->faker->dateTimeBetween('-80 years', '-20years')->format('Y-m-d'),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'description' => $this->faker->realText(),
            'UserRole_id' => $this->faker->randomElement([10, 20, 30, 40, 50, 51, 52, 60, 70]),
            'grade_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]),
            'is_udai' => $udai,
            //宇大かそうでないかの出し分けは上記の配列結合で対応
            'gender_id' => $this->faker->randomElement([1, 2, 3,]),
            'lived_country_id' => 1,
            'lived_prefecture_id' => 1,
            'lived_municipality_id' => 1,
            'birth_country_id' => 1,
            'birth_prefecture_id' => 1,
            'birth_municipality_id' => 1,
            'invited_id' => $this->faker->randomElement([1, 2]),
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

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name . '\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}

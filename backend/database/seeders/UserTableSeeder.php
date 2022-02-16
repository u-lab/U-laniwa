<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            [
                'name' => "開発者",
                'email' => "test1@example.com",
                'email_verified_at' => now(),
                'password' => Hash::make("test1234"),
                'remember_token' => Str::random(10),
                'birth_day' => now()->format('Y-m-d'),
                'last_name' => "幸教",
                'first_name' => "薄里",
                'description' => "自己紹介は省きます。",
                'user_role_id' => 70,
                'grade_id' => 2,
                'is_udai' => true,
                'faculty_id' => 1,
                'major_id' => 1,
                'gender_id' => 1,
                'lived_country_id' => 1,
                'lived_prefecture_id' => 1,
                'lived_municipality_id' => 1,
                'birth_country_id' => 1,
                'birth_prefecture_id' => 1,
                'birth_municipality_id' => 1,
                // 'invited_id' => 1,
                'is_dark_mode' => true,
                'is_publish_birth_day' => true,
                'is_graduate' => false,
                'status' => "珈琲駆動開発",
                'github_id' => "Usuyuki",
                'line_name' => "うすゆき",
                'slack_name' =>  "うすゆき",
                'discord_name' =>  "うすゆき",
                'hobbies' => "古典を読む、寝る",
                'interests' => "言語学、プログラミング",
                'languages' => "PHP、Python",
                'motto' => "困難は分割せよ"
            ],
        ];
        DB::table("users")->insert($param);
        //招待idで事故るのでここで一部作る
        \App\Models\User::factory(40)->create();
    }
}
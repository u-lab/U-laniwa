<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserInfoTableSeeder extends Seeder
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
                'user_id' => 1,
                'birth_day' => now()->format('Y-m-d'),
                'last_name' => "幸教",
                'first_name' => "薄里",
                'description' => "自己紹介は省きます。",
                'grade' => 2,
                'is_udai' => true,
                'faculty_id' => 1,
                'major_id' => 1,
                'gender' => 1,
                'lived_country_id' => 1,
                'lived_prefecture_id' => 1,
                'lived_municipality_id' => 1,
                'birth_country_id' => 1,
                'birth_prefecture_id' => 1,
                'birth_municipality_id' => 1,
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
        DB::table("user_infos")->insert($param);
        //招待idで事故るのでここで一部作る
        // \App\Models\UserInfo::factory(40)->has(User::factory()->count(1))->create();
    }
}
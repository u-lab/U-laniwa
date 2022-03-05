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
                'last_name' => "田中",
                'first_name' => "秀一",
                'description' => "自己紹介は省きます。",
                'grade' => 2,
                'u_u_major_id' => 3,
                'gender' => 1,
                'live_area_id' => 24,
                'birth_area_id' => 125,
                'group_affiliation' => '烏龍茶',
                'is_dark_mode' => true,
                'is_publish_birth_day' => true,
                'status' => "珈琲駆動開発",
                'github_id' => "Tester",
                'line_name' => "てすと",
                'slack_name' =>  "てすと！！",
                'discord_name' =>  "てすと！",
                'hobbies' => "古典を読む、寝る",
                'interests' => "言語学、プログラミング",
                'motto' => "デカルトみを感じる"

            ],
        ];
        DB::table("user_infos")->insert($param);
        //招待idで事故るのでここで一部作る
        // \App\Models\UserInfo::factory(40)->has(User::factory()->count(1))->create();
    }
}
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
                'name' => "開発者1(リンクやプロジェクト参加なし)",
                'email' => "test1@example.com",
                'email_verified_at' => now(),
                'password' => Hash::make("test1234"),
                'remember_token' => Str::random(10),
                'profile_photo_path' => "public/images/default/default_profile_photo.png",
                'user_role_id' => 70,
                'created_at' => now(),
                'updated_at' => now(),
                // 'invited_id' => 1,

            ],

            [
                'name' => "開発者2",
                'email' => "test2@example.com",
                'email_verified_at' => now(),
                'password' => Hash::make("test1234"),
                'remember_token' => Str::random(10),
                'profile_photo_path' => "public/images/default/default_profile_photo.png",
                'user_role_id' => 40,
                'created_at' => now(),
                'updated_at' => now(),
                // 'invited_id' => 1,

            ],
        ];
        DB::table("users")->insert($param);
        //招待idで事故るのでここで一部作る
        \App\Models\User::factory(38)->has(\App\Models\UserInfo::factory()->count(1))->create();
        $param = [
            'name' => "開発者3",
            'email' => "test3@example.com",
            'email_verified_at' => now(),
            'password' => Hash::make("test1234"),
            'remember_token' => Str::random(10),
            'profile_photo_path' => "public/images/default/default_profile_photo.png",
            'user_role_id' => 40,
            'created_at' => now(),
            'updated_at' => now(),
            // 'invited_id' => 1,
        ];
        DB::table("users")->insert($param);
    }
}

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
                'user_role_id' => 70,
                // 'invited_id' => 1,

            ],
        ];
        DB::table("users")->insert($param);
        //招待idで事故るのでここで一部作る
        \App\Models\User::factory(40)->create();
    }
}
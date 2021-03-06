<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleTableSeeder::class);
        $this->call(UUMajorTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        //user依存↑
        if (app()->isLocal() || app()->runningUnitTests()) {
            $this->call(UserTableSeeder::class); //自動生成(40人)+手動1
            //user被依存↓
            /**本番環境では使用しないシーダー*/
            $this->call(UserInfoTableSeeder::class); //Userのファクトリー実行時に併せて生成
            $this->call(UserInviteCodeTableSeeder::class);
            $this->call(UserTimelineTableSeeder::class); //自動生成(200)
            $this->call(UserLinkTableSeeder::class); //自動生成(80)
            $this->call(ProjectTableSeeder::class); //自動生成(20)+手動1
            $this->call(ProjectBelongedTableSeeder::class); //自動生成(50)
            $this->call(ProjectParticipationRequestTableSeeder::class); //自動生成(10)
            $this->call(ProjectProgressTableSeeder::class); //自動生成(60)
            $this->call(NoticeTableSeeder::class); //自動生成(120)
        }
    }
}
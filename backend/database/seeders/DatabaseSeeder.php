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
        $this->call(User_roleTableSeeder::class);
        $this->call(UU_facultyTableSeeder::class);
        $this->call(UU_majorTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(PrefectureTableSeeder::class);
        $this->call(MunicipalityTableSeeder::class);
        $this->call(GradeTableSeeder::class);
        //user依存↑
        $this->call(UserTableSeeder::class); //自動生成(40人)+手動1
        //user被依存↓
        $this->call(User_invite_codeTableSeeder::class);
        $this->call(User_linkTableSeeder::class); //自動生成(80)
        $this->call(User_belonged_organizationTableSeeder::class); //自動生成(30)
        $this->call(User_qualificationTableSeeder::class); //自動生成(80)
        $this->call(ProjectTableSeeder::class); //自動生成(20)+手動1
        $this->call(Project_belongedTableSeeder::class); //自動生成(50)
        $this->call(Project_participation_requestTableSeeder::class); //自動生成(10)
        $this->call(Project_progressTableSeeder::class); //自動生成(60)
        $this->call(Notice_genreTableSeeder::class);
        $this->call(NoticeTableSeeder::class); //自動生成(120)
    }
}
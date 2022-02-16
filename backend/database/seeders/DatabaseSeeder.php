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
        $this->call(CountryTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(GradeTableSeeder::class);
        $this->call(MunicipalityTableSeeder::class);
        $this->call(Notice_genreTableSeeder::class);
        $this->call(NoticeTableSeeder::class);
        $this->call(PrefectureTableSeeder::class);
        $this->call(Project_belongedTableSeeder::class);
        $this->call(Project_participation_requestTableSeeder::class);
        $this->call(Project_progressTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(User_belonged_organizationTableSeeder::class);
        $this->call(User_invite_codeTableSeeder::class);
        $this->call(User_linkTableSeeder::class);
        $this->call(User_qualificationTableSeeder::class);
        $this->call(User_roleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UU_facultyTableSeeder::class);
        $this->call(UU_majorTableSeeder::class);
    }
}
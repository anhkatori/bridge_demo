<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');
        DB::table('school_year')->insert([
            'name' => "2021",
            'time_start' => "2020-11-11 09:23:28",
            'time_start' => "2021-11-11 09:23:28",
        ]);
        DB::table('school_year')->insert([
            'name' => "2022",
            'time_start' => "2021-11-11 09:23:28",
            'time_start' => "2022-11-11 09:23:28",
        ]);
    }
}

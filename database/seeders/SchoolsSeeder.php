<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'name' => "SchoolA",
            'school_year_id' => "1",
        ]);
        DB::table('schools')->insert([
            'name' => "SchoolB",
            'school_year_id' => "2",
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'name' => "ClassA",
            'school_id' => "1",
        ]);
        DB::table('classes')->insert([
            'name' => "ClassB",
            'school_id' => "2",
        ]);
    }
}

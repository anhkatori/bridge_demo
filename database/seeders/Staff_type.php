<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Staff_type extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff_types')->insert([
            'name' => 'A',
        ]);
        DB::table('staff_types')->insert([
            'name' => 'B',
        ]);
    }
}

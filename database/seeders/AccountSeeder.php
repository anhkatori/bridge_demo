<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account')->insert([
            'full_name' => "Chainos",
            'email' => "chainos@gmail.com",
            'password' => Hash::make('12345678'),
            'role' => "admin",
            'class_id' => "1",
            'school_id' => "1",
            'school_year_id' => "1",
        ]);
    }
}

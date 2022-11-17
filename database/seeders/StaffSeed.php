<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;

class StaffSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');
        DB::table('staffs')->insert([
            'staff_id' => '1',
            'salary' => $faker->numberBetween(5000000,8000000),
            'time_salary' => "2022-11-02",
            'insurance' => $faker->numberBetween(5,15),
            'time_insurance' => "2022-11-02",
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
        DB::table('staffs')->insert([
            'staff_id' => '2',
            'salary' => $faker->numberBetween(5000000,8000000),
            'time_salary' => "2022-11-02",
            'insurance' => $faker->numberBetween(5,15),
            'time_insurance' => "2022-11-02",
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
        DB::table('staffs')->insert([
            'staff_id' => '3',
            'salary' => $faker->numberBetween(5000000,8000000),
            'time_salary' => "2022-11-02",
            'insurance' => $faker->numberBetween(5,15),
            'time_insurance' => "2022-11-02",
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
        DB::table('staffs')->insert([
            'staff_id' => '4',
            'salary' => $faker->numberBetween(5000000,8000000),
            'time_salary' => "2022-11-02",
            'insurance' => $faker->numberBetween(5,15),
            'time_insurance' => "2022-11-02",
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
        DB::table('staffs')->insert([
            'staff_id' => '5',
            'salary' => $faker->numberBetween(5000000,8000000),
            'time_salary' => "2022-11-02",
            'insurance' => $faker->numberBetween(5,15),
            'time_insurance' => "2022-11-02",
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
        DB::table('staffs')->insert([
            'staff_id' => '6',
            'salary' => $faker->numberBetween(5000000,8000000),
            'time_salary' => "2022-11-02",
            'insurance' => $faker->numberBetween(5,15),
            'time_insurance' => "2022-11-02",
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
    }
}

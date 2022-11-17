<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');
        DB::table('resource_allocation')->insert([
            'time' => $faker->dateTimeBetween('2020-01-01','2022-01-01') ,
            'staff_id' => rand(2,5),
            'project_id' => rand(1,10),
            'effort' => $faker->numberBetween(0,100),
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
        DB::table('resource_allocation')->insert([
            'time' => $faker->dateTimeBetween('2020-01-01','2022-01-01') ,
            'staff_id' => rand(2,6),
            'project_id' => rand(11,20) ?? null,
            'effort' => $faker->numberBetween(0,100),
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
    }
}

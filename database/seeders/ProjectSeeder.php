<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        $paths = array('1.jpg', '2.jpg','3.jpg');
        DB::table('project')->insert([
            'project_name' => $faker->name,
            'sale_pic' => $paths[array_rand($paths)],
            'market' => $faker->name,
            'Time_deployment_start' => $faker->dateTimeBetween('01-01-2020', '01-05-2022'),
            'Time_deployment_end' => $faker->dateTimeBetween('05-05-2022', '01-11-2022'),
            'status' => rand(0,1)
        ]);
    }
}

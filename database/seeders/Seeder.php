<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class OutsourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');
        DB::table('outsource_cost')->insert([
            'project_id' => rand(1,2),
            'time' => $faker->date(),
            'staff_id' => rand(1,2),
            'outsource_cost' => $faker->unique()->numberBetween(100000, 500000),
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
    }
}

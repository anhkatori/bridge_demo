<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class OTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');
        DB::table('ot_cost')->insert([
            'staff_id' => rand(1,2),
            'time' => $faker->date(),
            'time_OT' =>$faker->numberBetween(1, 100),
            'OT_cost' => $faker->unique()->numberBetween(100000, 500000),
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
    }
}

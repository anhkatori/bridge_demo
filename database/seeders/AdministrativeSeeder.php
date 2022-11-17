<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class AdministrativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');
        DB::table('administrative_cost')->insert([
            'time' => $faker->date(),
            'office_cost' => $faker->unique()->numberBetween(100000, 500000),
            'other_cost' => $faker->unique()->numberBetween(100000, 500000),
            'staff_cost' => $faker->unique()->numberBetween(100000, 500000),
            'staffs' => $faker->unique()->numberBetween(2, 20),
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ]);
    }
}

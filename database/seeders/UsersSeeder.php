<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paths = array('164938474623407-cccccc.jpg', '164996109240887-blank-post-it-note-1.png', '164822553533163-Untitled.png');
        $faker = Faker::create('vi_VN');
        DB::table('users')->insert([
            'name' => 'admin',
            'full_name' => 'admin',
            'staff_id' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'full_name' => 'user',
            'staff_id' => '2',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'PM',
            'full_name' => 'PM',
            'staff_id' => '3',
            'email' => 'PM@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'HR',
            'full_name' => 'HR/AD',
            'staff_id' => '4',
            'email' => 'HR@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'BOD',
            'full_name' => 'BOD',
            'staff_id' => '5',
            'email' => 'BOD@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sales',
            'full_name' => 'Sales',
            'staff_id' => '6',
            'email' => 'Sales@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}

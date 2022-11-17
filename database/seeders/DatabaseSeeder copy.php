<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            RoleSeeder::class,
            StaffSeed::class,
        ]);
        for ($i = 0; $i < 35; $i++) {
            $this->call([
                AdministrativeSeeder::class,
                OTSeeder::class,
                OutsourceSeeder::class,
                DeploymentSeeder::class,
                ProjectSeeder::class,
                ResourceSeeder::class,
            ]);
        }
    }
}

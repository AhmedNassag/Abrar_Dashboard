<?php

namespace Database\Seeders;

use Database\Seeders\AdminDashboard\AdminSeeder;
use Database\Seeders\AdminDashboard\PermissionTableSeeder;
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
        $this->call(PermissionTableSeeder::class);
        $this->call(AdminSeeder::class);
    }
}

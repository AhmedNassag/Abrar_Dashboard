<?php

namespace Database\Seeders\AdminDashboard;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\AdminDashboard\Admin;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        
        $admin = Admin::create([
            'id'         => 1,
            'name'       => 'Ahmed Nabil',
            'email'      => 'ahmednassg@gmail.com',
            'password'   => bcrypt('12345678'),
            'roles_name' => ['Super_Admin'],
        ]);
        
        $role = Role::create(['guard_name' => 'admin', 'name' => 'Super_Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);

    }
}
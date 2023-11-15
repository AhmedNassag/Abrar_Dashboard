<?php

namespace Database\Seeders\AdminDashboard;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //المديرين
            "عرض المديرين",
            "إضافة المديرين",
            "تعديل المديرين",
            "حذف المديرين",

            //الأدوار
            "عرض الأدوار",
            "إضافة الأدوار",
            "تعديل الأدوار",
            "حذف الأدوار",

            //الطلاب
            "عرض الطلاب",
            "إضافة الطلاب",
            "تعديل الطلاب",
            "حذف الطلاب",

            //المعلمين
            "عرض المعلمين",
            "إضافة المعلمين",
            "تعديل المعلمين",
            "حذف المعلمين",

            //الدورات
            "عرض الدورات",
            "إضافة الدورات",
            "تعديل الدورات",
            "حذف الدورات",

        ];



        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'admin']);
        }
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /*** start basic data ***/


        //Admin
        $this->app->bind(
            'App\Repositories\AdminDashboard\Admin\AdminInterface',
            'App\Repositories\AdminDashboard\Admin\AdminRepository',
        );

        //Role
        $this->app->bind(
            'App\Repositories\AdminDashboard\Role\RoleInterface',
            'App\Repositories\AdminDashboard\Role\RoleRepository',
        );

        //Teacher
        $this->app->bind(
            'App\Repositories\AdminDashboard\Teacher\TeacherInterface',
            'App\Repositories\AdminDashboard\Teacher\TeacherRepository',
        );

        //Course
        $this->app->bind(
            'App\Repositories\AdminDashboard\Course\CourseInterface',
            'App\Repositories\AdminDashboard\Course\CourseRepository',
        );

        //Country
        $this->app->bind(
            'App\Repositories\AdminDashboard\Country\CountryInterface',
            'App\Repositories\AdminDashboard\Country\CountryRepository',
        );

        //Department
        $this->app->bind(
            'App\Repositories\AdminDashboard\Department\DepartmentInterface',
            'App\Repositories\AdminDashboard\Department\DepartmentRepository',
        );

        //User
        $this->app->bind(
            'App\Repositories\AdminDashboard\User\UserInterface',
            'App\Repositories\AdminDashboard\User\UserRepository',
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

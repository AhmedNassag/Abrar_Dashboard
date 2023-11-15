<?php

namespace App\Repositories\AdminDashboard\Role;


interface RoleInterface
{
    public function index();

    public function getPermissions();

    public function store($request);

    public function update($request);

    public function destroy($request);
}
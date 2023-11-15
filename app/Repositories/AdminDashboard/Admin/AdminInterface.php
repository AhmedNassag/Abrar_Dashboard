<?php

namespace App\Repositories\AdminDashboard\Admin;

interface AdminInterface 
{

    public function index($request);
    
    public function show($id);
    
    public function store($request);

    public function update($request);

    public function destroy($request);

    public function deleteSelected($request);

}

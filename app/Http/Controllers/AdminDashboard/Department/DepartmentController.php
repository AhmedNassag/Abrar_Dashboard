<?php

namespace App\Http\Controllers\AdminDashboard\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\Department\DepartmentStoreRequest;
use App\Http\Requests\AdminDashboard\Department\DepartmentUpdateRequest;
use App\Repositories\AdminDashboard\Department\DepartmentInterface;


class DepartmentController extends Controller
{
    protected $department;

    public function __construct(DepartmentInterface $department)
    {
        $this->department = $department;
    }



    public function index(Request $request)
    {
        return $this->department->index($request);
    }



    public function show($id)
    {
        return $this->department->show($id);
    }



    public function store(DepartmentStoreRequest $request)
    {
        return $this->department->store($request);
    }



    public function update(DepartmentUpdateRequest $request)
    {
        return $this->department->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->department->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->department->deleteSelected($request);
    }
}

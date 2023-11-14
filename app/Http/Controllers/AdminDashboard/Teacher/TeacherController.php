<?php

namespace App\Http\Controllers\AdminDashboard\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\Teacher\TeacherStoreRequest;
use App\Http\Requests\AdminDashboard\Teacher\TeacherUpdateRequest;
use App\Repositories\AdminDashboard\Teacher\TeacherInterface;

class TeacherController extends Controller
{
    protected $teacher;

    public function __construct(TeacherInterface $teacher)
    {
        $this->teacher = $teacher;
    }



    public function index(Request $request)
    {
        return $this->teacher->index($request);
    }



    public function show($id)
    {
        return $this->teacher->show($id);
    }



    public function store(TeacherStoreRequest $request)
    {
        return $this->teacher->store($request);
    }



    public function update(TeacherUpdateRequest $request)
    {
        return $this->teacher->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->teacher->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->teacher->deleteSelected($request);
    }
}

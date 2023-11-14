<?php

namespace App\Http\Controllers\AdminDashboard\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\Course\CourseStoreRequest;
use App\Http\Requests\AdminDashboard\Course\CourseUpdateRequest;
use App\Repositories\AdminDashboard\Course\CourseInterface;

class CourseController extends Controller
{
    protected $course;

    public function __construct(CourseInterface $course)
    {
        $this->course = $course;
    }



    public function index(Request $request)
    {
        return $this->course->index($request);
    }



    public function show($id)
    {
        return $this->course->show($id);
    }



    public function store(CourseStoreRequest $request)
    {
        return $this->course->store($request);
    }



    public function update(CourseUpdateRequest $request)
    {
        return $this->course->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->course->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->course->deleteSelected($request);
    }
}

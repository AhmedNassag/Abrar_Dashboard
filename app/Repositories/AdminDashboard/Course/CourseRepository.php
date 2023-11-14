<?php

namespace App\Repositories\AdminDashboard\Course;

use App\Models\AdminDashboard\Course;
use App\Models\AdminDashboard\Teacher;

class CourseRepository implements CourseInterface 
{

    public function index($request)
    {
        $courses  = Course::with('teacher')->paginate(config('myConfig.paginate_count'));
        $teachers = Teacher::get(['id','name']);
        
        return view('AdminDashboard.course.index', compact('courses','teachers'));
    }



    public function show($id)
    {
        $course = Course::findOrFail($id);

        return view('AdminDashboard.course.show', compact('course'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            $inputs = $request->all();
            //insert data
            $course = Course::create($inputs);
            if (!$course) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update($request)
    {
        try {
            $validated = $request->validated();
            $course = Course::findOrFail($request->id);
            if (!$course) {
                session()->flash('error');
                return redirect()->back();
            }
            $inputs = $request->all();
            $course->update($inputs);
            if (!$course) {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($request)
    {
        try {
            // $related_table = realed_model::where('course_id', $request->id)->pluck('course_id');
            // if($related_table->count() == 0) { 
                $course = Course::findOrFail($request->id);
                if (!$course) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $course->delete();
                session()->flash('success');
                return redirect()->back();
            // } else {
                // session()->flash('canNotDeleted');
                // return redirect()->back();
            // }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function deleteSelected($request)
    {
        try {
            $delete_selected_id = explode(",", $request->delete_selected_id);
            // foreach($delete_selected_id as $selected_id) {
            //     $related_table = realed_model::where('course_id', $selected_id)->pluck('course_id');
            //     if($related_table->count() == 0) {
                    $courses = Course::whereIn('id', $delete_selected_id)->delete();
                    session()->flash('success');
                    return redirect()->back();
            //     } else {
            //         session()->flash('canNotDeleted');
            //         return redirect()->back();
            //     }
            // }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        
    }
}

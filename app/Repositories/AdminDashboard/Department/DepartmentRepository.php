<?php

namespace App\Repositories\AdminDashboard\Department;

use App\Models\AdminDashboard\Department;

class DepartmentRepository implements DepartmentInterface 
{

    public function index($request)
    {
        $departments = Department::paginate(config('myConfig.paginate_count'));
        
        return view('AdminDashboard.department.index', compact('departments'));
    }



    public function show($id)
    {
        $department = Department::findOrFail($id);

        return view('AdminDashboard.department.show', compact('department'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            $inputs = $request->all();
            //insert data
            $department = Department::create($inputs);
            if (!$department) {
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
            $department = Department::findOrFail($request->id);
            if (!$department) {
                session()->flash('error');
                return redirect()->back();
            }
            $inputs = $request->all();
            $department->update($inputs);
            if (!$department) {
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
            // $related_table = related_table::where('department_id', $request->id)->pluck('department_id');
            // if($related_table->count() == 0) { 
                $department = Department::findOrFail($request->id);
                if (!$department) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $department->delete();
                session()->flash('success');
                return redirect()->back();
            // } else {
            //     session()->flash('canNotDeleted');
            //     return redirect()->back();
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
            //     $related_table = related_table::where('department_id', $selected_id)->pluck('department_id');
            //     if($related_table->count() == 0) {
                    $departments = Department::whereIn('id', $delete_selected_id)->delete();
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

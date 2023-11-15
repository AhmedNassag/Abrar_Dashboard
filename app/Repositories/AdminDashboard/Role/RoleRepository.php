<?php

namespace App\Repositories\AdminDashboard\Role;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleRepository implements RoleInterface
{
    public function index()
    {
        return Role::paginate(30);
    }

    public function getPermissions()
    {
        return Permission::get(['id','name']);
    }

    public function store($request)
    {
        // try {
        //     $validated = $request->validated();
        //     //insert data
        //     $Department = Department::create([
        //         'name_ar' => $request->name_ar,
        //         'name_en' => $request->name_en,
        //     ]);
        //     if($Department)
        //     {
        //         toastr()->success(trans('messages.success'));
        //         return redirect()->back();
        //     }
        //     toastr()->error(trans('messages.error'));
        //     return redirect()->back();
        // } catch(\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }



    public function update($request)
    {
        // try {
        //     $validated = $request->validated();
        //     //Updat data
        //     $department = Department::findOrFail($request->id);
        //     if($department)
        //     {
        //         $department->update([
        //             'name_ar' => $request->name_ar,
        //             'name_en' => $request->name_en,
        //         ]);
        //         toastr()->success(trans('messages.success'));
        //         return redirect()->back();
        //     }
        //     toastr()->error(trans('messages.error'));
        //     return redirect()->back();
        // } catch(\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }



    public function destroy($request)
    {
        // try {
        //     $department = Department::findOrFail($request->id);
        //     $department->delete();
        //     if ($department) {
        //         toastr()->success(trans('messages.success'));
        //         return redirect()->back();
        //     }
        //     toastr()->error(trans('messages.error'));
        //     return redirect()->back();
        // } catch (\Exception $e) {
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }
}
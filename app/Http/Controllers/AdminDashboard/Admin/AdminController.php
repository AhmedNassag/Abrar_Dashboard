<?php

namespace App\Http\Controllers\AdminDashboard\Admin;

use DB;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminDashboard\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminDashboard\Admin\AdminStoreRequest;
use App\Http\Requests\AdminDashboard\Admin\AdminUpdateRequest;
use App\Repositories\AdminDashboard\Admin\AdminInterface;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $data = Admin::orderBy('id','DESC')->paginate(5);
        return view('AdminDashboard.admin.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    


    public function show($id)
    {
        $admin = Admin::find($id);
        return view('AdminDashboard.admin.show',compact('admin'));
    }
    


    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('AdminDashboard.admin.create',compact('roles'));
    }
    


    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'name'       => 'required',
            'email'      => 'required|email|unique:a_admins,email',
            'password'   => 'required',
            'roles_name' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $admin = Admin::create([
            'name'       => $input['name'],
            'email'      => $input['email'],
            'password'   => $input['password'],
            'roles_name' => $input['roles_name'],
        ]);
        $admin->assignRole($request->input('roles_name'));

        session()->flash('success');
        return redirect()->route('admins.index');
    }
    


    public function edit($id)
    {
        $admin    = Admin::find($id);
        $roles    = Role::pluck('name','name')->all();
        $adminRole = $admin->roles->pluck('name','name')->all();
        return view('AdminDashboard.admin.edit',compact('admin','roles','adminRole'));
    }
    

        
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:a_admins,email,'.$id,
            'password' => 'required',
            'roles'    => 'required'
        ]);
        $admin = Admin::find($id);
        $input = $request->all();
        if(!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
            $admin->update([
                'name'       => $input['name'],
                'email'      => $input['email'],
                'password'   => $input['password'],
                'roles_name' => $input['roles'],
            ]);
        } else {
            $input = array_except($input,array('password'));
            $admin->update([
                'name'       => $input['name'],
                'email'      => $input['email'],
                'roles_name' => $input['roles'],
            ]);
        }
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $admin->assignRole($request->input('roles'));

        session()->flash('success');
        return redirect()->route('admins.index');
    }
    


    public function destroy(Request $request)
    {
        Admin::find($request->admin_id)->delete();

        session()->flash('success');
        return redirect()->route('admins.index');
    }
    /*
    protected $admin;

    public function __construct(AdminInterface $admin)
    {
        $this->admin = $admin;
    }
    


    public function index(Request $request)
    {
        return $this->admin->index($request);
    }



    public function show($id)
    {
        return $this->admin->show($id);
    }



    public function store(AdminStoreRequest $request)
    {
        return $this->admin->store($request);
    }



    public function update(AdminUpdateRequest $request)
    {
        return $this->admin->update($request);
    }



    public function destroy(Request $request)
    {
        return $this->admin->destroy($request);
    }



    public function deleteSelected(Request $request)
    {
        return $this->admin->deleteSelected($request);
    }
    */
}

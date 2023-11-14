<?php

namespace App\Repositories\AdminDashboard\User;

use App\Models\AdminDashboard\Balance;
use App\Models\AdminDashboard\Comment;
use App\Models\AdminDashboard\Country;
use App\Models\AdminDashboard\FavoriteTeacher;
use App\Models\AdminDashboard\User;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserInterface 
{
    use ImageTrait;

    public function index($request)
    {
        $users     = User::with('country')->paginate(config('myConfig.paginate_count'));
        $countries = Country::get(['id','ar_name','en_name']);
        
        return view('AdminDashboard.user.index', compact('users','countries'));
    }



    public function show($id)
    {
        $user = User::with(['balances.balanceType','comments','favoriteTeachers','teacherRatings'])->findOrFail($id);

        return view('AdminDashboard.user.show', compact('user'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            $inputs = $request->all();
            //upload image
            if ($request->img) {
                $photo_name    = $this->uploadImage($request->img, 'attachments/user');
                $inputs['img'] = $photo_name;
            }
            $inputs['password'] = bcrypt($inputs['password']);
            //insert data
            $user = User::create($inputs);
            if (!$user) {
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
            $user = User::findOrFail($request->id);
            if (!$user) {
                session()->flash('error');
                return redirect()->back();
            }
            $inputs = $request->all();
            //upload image
            if ($request->img) {
                //remove old photo
                Storage::disk('attachments')->delete('user/' . $user->img);
                $photo_name = $this->uploadImage($request->img, 'attachments/user');
                $inputs['img'] = $photo_name;
            }
            $user->update($inputs);
            if (!$user) {
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
            $related_table_1 = Balance::where('user_id', $request->id)->pluck('user_id');
            $related_table_2 = Comment::where('user_id', $request->id)->pluck('user_id');
            $related_table_3 = FavoriteTeacher::where('user_id', $request->id)->pluck('user_id');
            if( $related_table_1->count() == 0 &&
                $related_table_2->count() == 0 &&
                $related_table_3->count() == 0
            ) { 
                $user = User::findOrFail($request->id);
                if (!$user) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $user->delete();
                session()->flash('success');
                return redirect()->back();
            } else {
                session()->flash('canNotDeleted');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function deleteSelected($request)
    {
        try {
            $delete_selected_id = explode(",", $request->delete_selected_id);
            foreach($delete_selected_id as $selected_id) {
                $related_table_1 = Balance::where('user_id', $selected_id)->pluck('user_id');
                $related_table_2 = Comment::where('user_id', $selected_id)->pluck('user_id');
                $related_table_3 = FavoriteTeacher::where('user_id', $selected_id)->pluck('user_id');
                if( $related_table_1->count() == 0 &&
                    $related_table_2->count() == 0 &&
                    $related_table_3->count() == 0
                ) {
                    $users = User::whereIn('id', $delete_selected_id)->delete();
                    session()->flash('success');
                    return redirect()->back();
                } else {
                    session()->flash('canNotDeleted');
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        
    }
}

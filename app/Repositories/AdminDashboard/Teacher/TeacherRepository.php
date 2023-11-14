<?php

namespace App\Repositories\AdminDashboard\Teacher;

use App\Models\AdminDashboard\Comment;
use App\Models\AdminDashboard\Course;
use App\Models\AdminDashboard\FavoriteTeacher;
use App\Models\AdminDashboard\Teacher;
use App\Traits\ImageTrait;
use Illuminate\Support\Facades\Storage;

class TeacherRepository implements TeacherInterface 
{
    use ImageTrait;

    public function index($request)
    {
        $teachers = Teacher::paginate(config('myConfig.paginate_count'));
        
        return view('AdminDashboard.teacher.index', compact('teachers'));
    }



    public function show($id)
    {
        $teacher = Teacher::with(['courses','comments.user','favoriteTeachers','teacherRatings'])->findOrFail($id);

        return view('AdminDashboard.teacher.show', compact('teacher'));
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            $inputs = $request->all();
            //upload image
            if ($request->img) {
                $photo_name    = $this->uploadImage($request->img, 'attachments/teacher');
                $inputs['img'] = $photo_name;
            }
            $inputs['password'] = bcrypt($inputs['password']);
            //insert data
            $teacher = Teacher::create($inputs);
            if (!$teacher) {
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
            $teacher = Teacher::findOrFail($request->id);
            if (!$teacher) {
                session()->flash('error');
                return redirect()->back();
            }
            $inputs = $request->all();
            //upload image
            if ($request->img) {
                //remove old photo
                Storage::disk('attachments')->delete('teacher/' . $teacher->img);
                $photo_name = $this->uploadImage($request->img, 'attachments/teacher');
                $inputs['img'] = $photo_name;
            }
            $teacher->update($inputs);
            if (!$teacher) {
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
            $related_table_1 = Course::where('teacher_id', $request->id)->pluck('teacher_id');
            $related_table_2 = Comment::where('teacher_id', $request->id)->pluck('teacher_id');
            $related_table_3 = Course::where('teacher_id', $request->id)->pluck('teacher_id');
            $related_table_4 = FavoriteTeacher::where('teacher_id', $request->id)->pluck('teacher_id');
            if( $related_table_1->count() == 0 && 
                $related_table_2->count() == 0 &&
                $related_table_3->count() == 0 &&
                $related_table_4->count() == 0
            ) { 
                $teacher = Teacher::findOrFail($request->id);
                if (!$teacher) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $teacher->delete();
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
                $related_table_1 = Course::where('teacher_id', $selected_id)->pluck('teacher_id');
                $related_table_2 = Comment::where('teacher_id', $selected_id)->pluck('teacher_id');
                $related_table_3 = Course::where('teacher_id', $selected_id)->pluck('teacher_id');
                $related_table_4 = FavoriteTeacher::where('teacher_id', $selected_id)->pluck('teacher_id');
                if( $related_table_1->count() == 0 && 
                    $related_table_2->count() == 0 && 
                    $related_table_3->count() == 0 &&
                    $related_table_4->count() == 0
                ) {
                    $teachers = Teacher::whereIn('id', $delete_selected_id)->delete();
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

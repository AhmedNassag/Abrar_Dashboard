<?php

namespace App\Models\AdminDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'a_teachers';
    protected $guarded = [];

    //start relations
    public function courses()
    {
        return $this->hasMany(Course::class,'teacher_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'teacher_id');
    }

    public function favoriteTeachers()
    {
        return $this->hasMany(FavoriteTeacher::class,'teacher_id');
    }

    public function teacherRatings()
    {
        return $this->hasMany(TeacherRating::class,'teacher_id');
    }
}

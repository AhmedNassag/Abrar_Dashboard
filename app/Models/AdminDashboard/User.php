<?php

namespace App\Models\AdminDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'a_users';
    protected $guarded = [];

    //use accessors
    //this concatenate first_name and last_name to be able to fetch them together by call full_name 
    public function getFullNameAttribute()
    {
        return $this->first_name ." ". $this->last_name;
    }



    //start relations
    public function country()
    {
        return $this->belongsTo(Country::class,'Country_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'user_id');
    }

    public function favoriteTeachers()
    {
        return $this->hasMany(FavoriteTeacher::class,'user_id');
    }

    public function teacherRatings()
    {
        return $this->hasMany(TeacherRating::class,'user_id');
    }

    public function balances()
    {
        return $this->hasMany(Balance::class,'user_id');
    }
}

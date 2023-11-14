<?php

namespace App\Models\AdminDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteTeacher extends Model
{
    use HasFactory;

    protected $table = 'a_favorite_teachers';
    protected $guarded = [];

    //start relations
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

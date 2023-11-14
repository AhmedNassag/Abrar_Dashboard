<?php

namespace App\Models\AdminDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'a_courses';
    protected $guarded = [];

    //start relations
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
}

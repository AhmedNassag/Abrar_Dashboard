<?php

namespace App\Models\AdminDashboard;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'a_admins';
    protected $guarded =[];
}
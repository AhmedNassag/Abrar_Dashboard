<?php

namespace App\Models\AdminDashboard;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use SoftDeletes;
    use HasRoles;

    protected $table = 'a_admins';
    protected $guarded =[];
    protected $casts = ['roles_name' => 'array'];
}
<?php

namespace App\Models\AdminDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'a_countries';
    protected $guarded = [];

    //start relations
    public function users()
    {
        return $this->hasMany(User::class,'Country_id');
    }
}

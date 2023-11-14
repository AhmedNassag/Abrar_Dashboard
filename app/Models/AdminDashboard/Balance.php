<?php

namespace App\Models\AdminDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $table = 'a_balance';
    protected $guarded = [];

    //start relations
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function balanceType()
    {
        return $this->belongsTo(BalanceType::class,'type');
    }
}

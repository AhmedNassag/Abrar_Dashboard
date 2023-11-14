<?php

namespace App\Models\AdminDashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceType extends Model
{
    use HasFactory;

    protected $table = 'a_balance_type';
    protected $guarded = [];

    //start relations
    public function balances()
    {
        return $this->hasMany(Balance::class,'type');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;

    public function user_loan()
    {
        return $this->hasOne(LoanUser::class,'id',"loan_user_id");
    }
    public function scopeLatestTransaction($query) {
       return $query->orderBy("created_at","desc");
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class,'loan_user');
    }

    public function transactions()
    {
        return $this->hasManyThrough(UserTransaction::class,LoanUser::class,'loan_type_id','loan_user_id');
    }
}

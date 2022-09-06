<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanUser extends Model
{
    use HasFactory;
    protected $table = 'loan_user';
    public $timestamps = true;


    public function user()
    {
        return $this->hasOne(User::class,"id","user_id");
    }

    public function loan_type()
    {
        return $this->hasOne(LoanType::class,'id',"loan_type_id");
    }

    public function transactions()
    {
        return $this->hasMany(UserTransaction::class,"loan_user_id","id");
    }
    public function scopePendingRequest($query) {
        return $query->where("status","pending");
    }

}

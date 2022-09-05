<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\LoanType;
use App\Interface\User\UserInterface;

class UserController extends Controller
{
    public function list_users(Request $request, UserInterface $user)
    {
        dd($user->getAll());
    }    

    public function list_user_loans(Request $request, UserInterface $user)
    {
        dd($user->getAll());
    } 
}
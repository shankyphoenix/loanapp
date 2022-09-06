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

use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    public function get_users(Request $request, UserInterface $user)
    {
        return new UserCollection(User::orderBy('name')->paginate(100));
    }    

    public function list_user_loans(Request $request, UserInterface $user)
    {
        return new UserResource(User::find($request_id));
    } 
}
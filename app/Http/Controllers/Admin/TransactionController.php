<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Interface\User\UserInterface;

use App\Models\LoanType;
use App\Models\UserTransaction;

use App\Http\Resources\TransactionResource;
use App\Http\Resources\TransactionCollection;

class TransactionController extends Controller
{
    public function get_transactions(Request $request, UserInterface $user)
    {
        return new TransactionCollection(UserTransaction::latestTransaction()->paginate(100));
    }    

    public function transaction_detail(Request $request, UserInterface $user)
    {
        return new TransactionResource(UserTransaction::find($request_id));
    } 
}
<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\LoanUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoanTypeCollection;
use App\Http\Resources\LoanDetailResource;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    public function get_loans(Request $request)
    {
        return new LoanTypeCollection(Auth::user()->loans()->orderBy("created_at","desc")->paginate(100));
    }
    public function loan_detail(Request $request, $loan_id)
    {
        return new LoanDetailResource(LoanUser::find($loan_id));
    }
}

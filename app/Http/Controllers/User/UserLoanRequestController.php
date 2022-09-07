<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;
use App\Models\LoanUser;
use App\Http\Controllers\Controller;



class UserLoanRequestController extends Controller
{
    public function request_loan(LoanRequest $request)
    {

        $lastID= LoanUser::insertGetId([
            "user_id" => $request->user()->id,
            "loan_type_id" => $request->loan_type_id,
            "loan_amount" => $request->loan_amount,
            "tenure" => $request->tenure,
            "status" => "pending",
            "payment_day" => $request->payment_day,
            "interest" => $request->interest,            
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ]);

        
        event(new \App\Events\RequestedLoan(LoanUser::find($lastID), $request->user(), ["to" => $request->user()->email]));


        return response()->json([
                'status' => true,
                'message' => 'Loan Requested Successfully',
            ], 200);
    }
}

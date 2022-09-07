<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\LoanUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoanTypeCollection;
use App\Http\Resources\LoanDetailResource;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTransaction;


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
    public function pay_emi(Request $request, $next_transaction_id)
    {
        $record = UserTransaction::find($next_transaction_id);

        if($record->status == "pending" || $record->status == "failed") {

            $record->status = "success";
            $record->payment_type = $request->payment_type;
            $record->save();
            return response()->json([
                'status' => true,
                'message' => 'Paid Successfully',                
            ], 200);

        }
        elseif($record->status == "success") {
              return response()->json([
                'status' => true,
                'message' => 'Already Paid for this month.',                
            ], 200);
        }

    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\LoanType;
use App\Models\LoanUser;
use App\Interface\User\UserInterface;

use App\Http\Resources\LoanUserCollection;
use App\Http\Resources\LoanUserResource;
use App\Http\Resources\LoanDetailResource;


class LoanController extends Controller
{
    public function pending_loan_requests(Request $request, UserInterface $user)
    {
        return new LoanUserCollection(LoanUser::pendingRequest()->paginate(100));
    }
    public function all_requests(Request $request, UserInterface $user)
    {
        return new LoanUserCollection(LoanUser::paginate(100));
    }    

    public function pending_loan_requests_detail(Request $request, UserInterface $user, $request_id)
    {
        return new LoanDetailResource(LoanUser::find($request_id));
    }
    public function loan_action(Request $request, UserInterface $user)
    {
        $status_text = "";
        
        if($request->action == 1){ $status_text = "ongoing"; $response_message = "Loan Request Approved";  }
        if($request->action == 2){ $status_text = "rejected"; $response_message = "Loan Request Rejected";   }

        LoanUser::where("id",$request->request_id)->update(["status"=>$status_text,"comment"=>$request->comment]);

        $loan = LoanUser::where("id",$request->request_id)->first();
        $user = $loan->user;
        $mailInfo =  ["to" => $user->email];

        event(new \App\Events\AdminRequestAction($loan, $user, $mailInfo));

        return response()->json([
                'status' => true,
                'message' => $response_message,
            ], 200);
    } 
}
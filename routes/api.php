<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\Api\AuthController;


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/request_loan', [UserLoanRequestController::class, 'request_a_loan']);
Route::get('/loans', [LoanController::class, 'get_loans']);
Route::get('/loans/{id}', [LoanController::class, 'loan_detail']);


Route::group(['middleware' => ['auth:sanctum','adminonly']], function() {
    Route::prefix('admin')->group(function () {        

        Route::get('/pending_loan_requests', [\App\Http\Controllers\Admin\LoanController::class,"pending_loan_requests"]);
        Route::get('/pending_loan_requests/{request_id}', [\App\Http\Controllers\Admin\LoanController::class,"pending_loan_requests_detail"]);
        Route::post('/pending_loan_requests/{request_id}/{action}', [\App\Http\Controllers\Admin\LoanController::class,"loan_action"]);
      
        Route::get('/transaction', [\App\Http\Controllers\Admin\TransactionController::class,"get_transactions"]);
        Route::get('/transaction/search/{?field}/{searchtext}', [\App\Http\Controllers\Admin\TransactionController::class,"transaction_search"]);
        Route::get('/transaction/id', [\App\Http\Controllers\Admin\TransactionController::class,"transaction_detail"]);

        Route::get('/users', [\App\Http\Controllers\Admin\UserController::class,"get_users"]);
        Route::get('/users/id', [\App\Http\Controllers\Admin\UserController::class,"user_detail"]);
        Route::get('/users/search/{?field}/{searchtext}', [\App\Http\Controllers\Admin\UserController::class,"user_search"]);
    });
});


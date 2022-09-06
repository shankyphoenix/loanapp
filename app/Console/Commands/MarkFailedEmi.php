<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LoanUser;
use App\Models\UserTransaction;

class MarkFailedEmi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loan:markfailedemis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark Failed EMI if any.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        $data = LoanUser::where("status","ongoing")->get();
        $data->map(function($data){
            UserTransaction::where("loan_user_id",$data->id)
                            ->where("status","pending")
                            ->where("created_at",">",date("Y-m-d H:i:s"))
                ->update([
                            "status"          =>  "failed",                          
                        ]);
        });
    }
}

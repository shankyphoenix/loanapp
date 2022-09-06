<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LoanUser;
use App\Models\UserTransaction;
class SetEmi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loan:emis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Payment Transaction of Ongoing Loans';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = LoanUser::where("status","ongoing")->get();
        $data->map(function($data){
            UserTransaction::insert([
                "loan_user_id"    =>  $data->id,
                "status"          =>  "pending",
                "payment_type"    =>  "",
                "created_at"      =>  date("Y-m-d H:i:s"),
            ]);
        });
    }
}

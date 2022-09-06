<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class LoanDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return [
                "id"                     => $this->id,
                "status"                 => $this->status, 
                "user_detail"            => $this->user,
                "loan_detail"            => $this->loan_type,
                "amount"                 => $this->loan_amount,                
                "tenure"                 => $this->tenure." month(s)",
                "emi"                    => $this->tenure,
                "emi_paid"               => $this->transactions->where("status","success")->count(),
                "emi_remaining"          => $this->tenure - $this->transactions->where("status","success")->count(),
                "emi_failed"             => $this->transactions->where("status","failed")->count(),
                "transactions"           => $this->transactions                
              ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class TransactionResource extends JsonResource
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
                "id" => $this->id,
                "user_name" => $this->user_loan->user->name,
                "user_email" => $this->user_loan->user->email,
                "emi_amount" => $this->user_loan->loan_amount,
                "status" => $this->status,
                "payment_type" => $this->payment_type,
                "emi_amount" => Carbon::Parse($this->created_at)->format("d-M-Y"),
        ];
    }
}

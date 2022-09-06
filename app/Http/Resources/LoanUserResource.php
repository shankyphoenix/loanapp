<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class LoanUserResource extends JsonResource
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
                "loan_name"              => $this->loan_type->name,
                "loan_type"              => $this->loan_type->type,
                "user_name"              => $this->user->name,
                "user_email"             => $this->user->email,
                "amount"                 => $this->loan_amount,                
                "tenure"                 => $this->tenure." month(s)",
                "status"                 => $this->status,
                "requested_date"         => Carbon::Parse($this->created_at)->format("d-M-Y"),
              ];
    }
}

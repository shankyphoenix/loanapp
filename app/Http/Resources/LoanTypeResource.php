<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class LoanTypeResource extends JsonResource
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
            'name'                          => $this->name,                        
            'loan_amount'                   => $this->pivot->loan_amount,
            'tenure'                        => $this->pivot->tenure,
            'status'                        => $this->pivot->status,
            'interest'                      => $this->pivot->interest."%",
            'created_at'                    => Carbon::Parse($this->pivot->created_at)->format("d-M-Y"),
        ];
    }
}

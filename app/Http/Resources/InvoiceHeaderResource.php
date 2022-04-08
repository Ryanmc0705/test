<?php

namespace App\Http\Resources;

use App\Models\Company;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceHeaderResource extends JsonResource
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
            "invoice_number" => $this->invoice_number,
            "invoice_date" => $this->invoice_date,
            "address" => $this->address,
            "sold_to" => $this->sold_to,
            "amount_paid" => $this->amount_paid,
            "total" => $this->total,
            "company" => New CompanyResource($this->Company)

        ];
    }
}

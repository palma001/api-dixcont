<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'id' => $this->id,
            'code' => $this->code,
            'created_at' => $this->created_at,
            'invoice_type' => $this->invoiceType,
            'products' => $this->products,
            'seller' => $this->seller,
            'total' => $this->total,
            'client' => $this->client,
            'exchange_rate' => $this->exchange_rate,
            'tables' => TableResource::collection($this->tables)
        ];
    }
}

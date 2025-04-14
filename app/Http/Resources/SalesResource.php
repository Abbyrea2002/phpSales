<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalesResource extends JsonResource
{
    public function toArray(Request $request): array 
    { 
        return [ 
            'id' => $this->id, 
            'item_name' => $this->item_name,
            'description' => $this->description, 
            'quantity' => $this->quantity, 
            'price' => $this->price, 
            'payment_method' => $this->payment_method, 
            'created_at' => $this->created_at->toDateTimeString(), 
            'updated_at' => $this->updated_at->toDateTimeString(), 
        ]; 
    } 

}

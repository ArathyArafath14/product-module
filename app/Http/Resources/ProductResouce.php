<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'Price' => $this->product_price,
            'User' => $this->adding_person,
            'Type' => $this->type,
            'Status'=> $this->status,
            'href' => [
               'link' => route('products.show',$this->id)
            ]
        ];
    }
}

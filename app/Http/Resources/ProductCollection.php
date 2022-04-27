<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->transform(
            function($item, $key) {            
            return [
                'name' => $item->productDetails->name,
                'categories' => $item->categories->name,
                'color' => $item->productDetails->color,
                'selling_price' => $item->selling_price,
                'qty' => $item->qty,
            ];
            }
        );
    }
}

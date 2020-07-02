<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StallResource extends JsonResource {
    
    private $list;
    
    public function __construct($resource, $list = false) {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->list = $list;
    }
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'categoryName' => $this->category->name,
            'name' => $this->name,
            'cover' => $this->coverUrl(),
            'desc' => $this->desc,
            'lon' => $this->lon,
            'lat' => $this->lat,
            'status' => $this->status,
            'products' => $this->when(!$this->list, ProductResource::collection($this->products))
        ];
    }
}

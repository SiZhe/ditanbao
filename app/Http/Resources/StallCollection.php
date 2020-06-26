<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Stall;

class StallCollection extends ResourceCollection
{
    private $list;
    
    public function __construct($resource, $list = true) {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->list = $list;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        $list = $this->list;
        $this->collection->transform(function (Stall $stall) use($list) {
            return new StallResource($stall, $list);
        });
        return parent::toArray($request);
    }
}

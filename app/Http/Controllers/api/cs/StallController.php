<?php

namespace App\Http\Controllers\api\cs;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Models\Stall;

class CategoryController extends BaseController {
    
    public function index() {
        $stalls = Stall::where('status', Stall::STATUS_OPENING);
        return $this->respOk(CategoryResource::collection($categories));
	}
}

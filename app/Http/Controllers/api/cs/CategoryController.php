<?php

namespace App\Http\Controllers\api\cs;

use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends BaseController {
    
    public function index() {
        $categories = Category::whereNull('parent_id')->get();
        return $this->respOk(CategoryResource::collection($categories));
	}
}

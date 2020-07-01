<?php

namespace App\Http\Controllers\api\cs;

use Illuminate\Support\Facades\Request;
use App\Models\Stall;
use App\Models\Product;
use App\Tools\Utils\QiniuUtils;
use App\Http\Resources\ProductResource;

class ProductController extends BaseController {
    
    public function index($stall) {
        if(is_null($stall)) {
            return $this->error(self::ERROR_STALL_NOT_EXIST);
        }
        $products = $stall->products()->paginate(30);
        return $this->respOK(ProductResource::collection($products));
    }
    
	public function store($stallId) {
	    $stall = Stall::find($stallId);
	    if(is_null($stall)) {
	        return $this->error(self::ERROR_STALL_NOT_EXIST);
	    }
	    $input = Request::input();
	    if(is_null($input['name']) OR !Request::hasFile('thumbnail')) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    $input['thumbnail'] = QiniuUtils::save(Request::file('thumbnail'));
	    $input['stall_id'] = $stall->id;
	    $product = Product::create($input);
	    if($product) {
	        return $this->respOK();
	    }
	    return $this->error(self::ERROR_OPERATION);
	}
}

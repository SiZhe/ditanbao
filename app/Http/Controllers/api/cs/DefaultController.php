<?php

namespace App\Http\Controllers\api\cs;

use App\Http\Resources\UserResource;
use App\Http\Resources\StallCollection;

class DefaultController extends BaseController {
    
    public function profile() {
        return $this->respOk(new UserResource($this->user));
	}
	
	public function stalls() {
	    $stalls = $this->user->stalls()->paginate(30);
	    return $this->respOK(new StallCollection($stalls));
	}
}

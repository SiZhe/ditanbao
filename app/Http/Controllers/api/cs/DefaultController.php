<?php

namespace App\Http\Controllers\api\cs;

use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Request;

class DefaultController extends BaseController {
    
    public function profile() {
        return $this->respOk(new UserResource($this->user));
	}
	
	public function geo() {
	    if(is_null(Request::input('lon')) OR is_null(Request::input('lat'))) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    $user = $this->user;
	    $user->lon = Request::input('lon');
	    $user->lat = Request::input('lat');
	    $user->save();
	    return $this->respOK();
	}
}

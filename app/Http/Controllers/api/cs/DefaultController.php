<?php

namespace App\Http\Controllers\api\cs;

use App\Http\Resources\UserResource;
use App\Http\Resources\StallCollection;
use Illuminate\Support\Facades\Request;
use App\Models\User;

class DefaultController extends BaseController {
    
    public function profile() {
        return $this->respOk(new UserResource($this->user));
	}
	
	public function stalls() {
	    $stalls = $this->user->stalls()->paginate(30);
	    return $this->respOK(new StallCollection($stalls));
	}
	
	public function version() {
	    $version = Request::input('version');
	    if(!in_array($version, [User::VERSION_COMMON, User::VERSION_STALL])) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    $user = $this->user;
	    if($version == User::VERSION_STALL and is_null($user->stall)) {
	        return $this->error(self::ERROR_STALL_NOT_OPEN);
	    }
	    $user->version = $version;
	    $user->save();
	    return $this->respOK(new UserResource($user));
	}
}

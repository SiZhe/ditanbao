<?php

namespace App\Http\Controllers\api\cs;

use App\Http\Controllers\api\ApiController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends ApiController {

    protected $user;
    
    public function __construct(Request $request) {
        $this->user = Auth::guard('api')->user();
    }
}

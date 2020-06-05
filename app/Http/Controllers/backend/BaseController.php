<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class BaseController extends Controller {
    
    protected $admin;
    
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->admin = auth('backend')->user();
            View::share('admin', $this->admin);
            return $next($request);
        });
    }
}

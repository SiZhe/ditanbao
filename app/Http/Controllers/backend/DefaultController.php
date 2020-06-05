<?php

namespace App\Http\Controllers\backend;

class DefaultController extends BaseController {
	
    public function index() {
        return view('backend.index');
	}
}
<?php

namespace App\Http\Controllers\backend;

use App\Models\User;

class UserController extends BaseController {
	
	public function index() {
		$users = User::orderBy('id', 'desc')->paginate(100);
		return view('backend.users', compact('users'));
	}
}
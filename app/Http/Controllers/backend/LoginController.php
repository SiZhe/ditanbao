<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrator;

class LoginController extends BaseController {
	
	protected $redirectTo = '/backend';
	
	public function __construct() {
		$this->middleware ('guest:backend', [
			'except' => 'logout'
		]);
	}
	
	public function login() {
		session(['url.intended' => url()->previous()]);
		return view('backend.login');
	}
	
	public function attempt() {
		$input = Request::all();
		$validation = Validator::make($input, self::$rules, self::$msgs);
		if ($validation->passes()) {
			if(Auth::guard('backend')->attempt([
				'username' => Request::input('username'),
				'password' => Request::input('password'),
			], true)) {
			    $auth = auth('backend')->user();
			    if($auth->disabled) {
			        Session::flash('msg', '您的账户已被禁用,如需登录请联系管理员。');
			        Auth::guard('backend')->logout();
			    }
				return redirect()->intended('/backend/');
			}
			Session::flash('msg', '您输入的帐号或密码有误。');
		}
		
		return Redirect::back()
			->withInput()
			->withErrors($validation);
	}
	
	public function getForgetPassword() {
	    return view('backend.forget_password');
	}
	
	public function postResetPassword() {
	    $input = Request::all();
	    $rules = [
	        'username' => 'required',
	        'password' => 'required',
	        'cPassword' => 'required',
	    ];
	    $msgs = [
	        'username.required' => '账户不能为空',
	        'password.required' => '请填写您的密码。',
	        'cPassword.required' => '请填写确认密码。',
	    ];
	    $validation = Validator::make($input, $rules, $msgs);
	    if ($validation->passes()) {
	        $admin = Administrator::where('username', $input['username'])->first();
	        $admin->password = Hash::make($input['password']);
	        $admin->save();
	        Session::flash('msg', '密码重置成功，请登录账户。');
	        return Redirect::to('/backend/login');
	    }
	    
	    return Redirect::back()
    	    ->withInput()
    	    ->withErrors($validation);
	}
	
	public function logout() {
		Auth::guard('backend')->logout();
		Session::flush();
		return Redirect::to('/backend/');
	}
	
	// Validation
	public static $rules = array(
		'username' => 'required',
		'password' => 'required',
	);
	public static $msgs = array(
		'username.required' => '请填写您的用户名。',
		'password.required' => '请填写您的密码。',
	);
}

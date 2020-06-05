<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable {
	use Notifiable;
	
	protected $guarded = array('id');
	
	public static $rules = [
		'username' => 'required|unique:administrators|max:128',
		'password' => 'required|max:30',
	];
	
	public static $msgs = [
	    'username.required' => '管理员用户名不能为空',
		'username.unique' => '管理员用户名已经存在',
		'username.max' => '用户名长度不能超过16字',
		'password.required' => '密码不能为空',
		'password.max' => '密码长度不能超过30个字',
	];
}

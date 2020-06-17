<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Tools\Utils\QiniuUtils;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens,Notifiable;
	
	protected $guarded = array('id');
	
	public function stall() {
	    return $this->hasOne('App\Models\Stall');
	}

	public function avatarUrl($dimension = null) {
	    return QiniuUtils::getUrl($this->avatar, $dimension);
	}
	
	public function findForPassport($login) {
	    return $this->orWhere('username', $login)->first();
	}
	
	const VERSION_COMMON = 'common';
	const VERSION_STALL = 'stall';
	
	public static $versions = [
	    self::VERSION_COMMON => '普通版',
	    self::VERSION_STALL => '摊主版',
	];
	
	public function getVersionEx() {
	    return self::$versions[$this->version];
	}
	
	protected $hidden = [
	    'password',
	    'remember_token'
	];

	public static function boot() {
	    parent::boot();
	    self::created(function($user){
	        $user->version = self::VERSION_COMMON;
	        $user->save();
	    });
	}
	
}

<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Utils\QiniuUtils;

class User extends Authenticatable {
	use Notifiable;
	
	protected $guarded = array('id');

	public function avatarUrl($dimension = null) {
	    return QiniuUtils::getUrl($this->avatar, $dimension);
	}

	public static function boot() {
	    parent::boot();
	}
	
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Tools\Utils\QiniuUtils;
use Carbon\Carbon;

class Stall extends Model {
	
	protected $guarded = ['id'];
	
	public function category() {
		return $this->belongsTo('App\Models\Category');
	}
	
	public function user() {
	    return $this->belongsTo('App\Models\User');
	}
	
	public function products() {
	    return $this->hasMany('App\Models\Product');
	}
	
	public function users() {
	    return $this->belongsToMany('App\Models\User');
	}
	
	public function visitors() {
	    return $this->hasMany('App\Models\Visitor');
	}
	
	public function todayVisitors() {
	    return $this->visitors()->where('visited_at', '>', Carbon::now()->today());
	}
	
	public function todayUsers() {
	    $userIds = StallUser::where('stall_id', $this->id)->where('created_at', '>', Carbon::now()->today())->pluck('id');
	    return User::whereIn('id', $userIds);
	}
	
	public function coverUrl($dimension = null) {
	    return QiniuUtils::getUrl($this->cover, $dimension);
	}
	
	const STATUS_REST = 1;
	const STATUS_OPENING = 2;
	
	public static $status = [
	    self::STATUS_REST => '休息',
	    self::STATUS_OPENING => '出摊',
	];
	
	public function getStatusEx() {
	    return self::$status[$this->status];
	}
	
	public static $rules = [
	    'name' => 'required|max:64',
	    'user_id' => 'required',
	];
	
	public static $msgs = [
	    'name.required' => '摊位名称不能为空',
	    'user_id.required' => '摊主不能为空',
	];
}

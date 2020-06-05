<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	
	protected $guarded = ['id'];
	
	public function parentCategory() {
		return $this->belongsTo('App\Models\Category', 'parent_id');
	}
	
	public function subCategories() {
		return $this->hasMany('App\Models\Category', 'parent_id');
	}
	
	public function depth($depth = 0) {
	    if(!is_null($this->parentCategory)) {
	        $depth ++;
	        $depth = $this->parentCategory->depth($depth);
	    }
	    return $depth;
	}
	
	public static $rules = [
		'name' => 'required|max:64',
	];
	
	public static $msgs = [
		'name.required' => '分类名称不能为空',
	];
}

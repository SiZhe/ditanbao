<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Utils\QiniuUtils;

class Product extends Model{
    
    protected $guarded = array('id');
    
    public function stall() {
        return $this->belongsTo('App\Models\Stall');
    }
    
    public function thumbnailUrl($dimension = null) {
        return QiniuUtils::getUrl($this->thumbnail, $dimension);
    }
    
}

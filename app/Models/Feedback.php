<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Utils\QiniuUtils;

class Feedback extends Model{
    
    protected $table = 'feedbacks';
    protected $guarded = array('id');
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function thumbnailUrl($dimension = null) {
        return QiniuUtils::getUrl($this->thumbnail, $dimension);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model{
    
    protected $guarded = array('id');
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function follower() {
        return $this->belongsTo('App\Models\Follower');
    }
}

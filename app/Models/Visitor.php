<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model{
    
    protected $guarded = array('id');
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function stall() {
        return $this->belongsTo('App\Models\Stall');
    }
}

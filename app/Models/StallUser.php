<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StallUser extends Model{
    
    protected $guarded = array('id');
    
    protected $table = 'stall_user';
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function stall() {
        return $this->belongsTo('App\Models\Stall');
    }
}

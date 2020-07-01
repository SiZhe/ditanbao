<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model{
    
    protected $guarded = array('id');
    
    public function stall() {
        return $this->belongsTo('App\Models\Stall');
    }
    
    const STATUS_PENDING = 1;
    const STATUS_PASS = 2;
    const STATUS_FAILED = 3;
    
    public static $status = [
        self::STATUS_PENDING => '审核中',
        self::STATUS_PASS => '通过',
        self::STATUS_FAILED => '失败',
    ];
}

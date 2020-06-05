<?php

namespace App\Utils;

use Illuminate\Support\Facades\Storage;

class QiniuUtils {
    
    private $path = 'uploads/ditanbao/';
    private $disk;
    
    public function __construct() {
        $this->disk = Storage::disk('qiniu');
    }
    
	public static function save($img) {
	    $qiniu = new QiniuUtils();
	    $path = $qiniu->path.date('Ymd');
	    $url = $qiniu->disk->put($path, $img);
	    $nName = substr($url, strlen($qiniu->path));
	    return $nName;
	}
	
	public static function getUrl($path, $dimension) {
	    if(starts_with($path, 'http')) {
	        return $path;
	    }
	    return self::get($path, $dimension);
	}
	
	private static function get($thumbnail, $dimension = null) {
	    $qiniu = new QiniuUtils();
	    $url = $qiniu->disk->getUrl($qiniu->path . $thumbnail);
	    if(!is_null($dimension)) {
	        $pos = strpos($dimension, 'x');
	        $x = substr($dimension, 0, $pos);
	        $y = substr($dimension, $pos + 1);
	        $url = $url . '?imageView2/1/w/' . $x . '/h/' . $y . '/format/jpg/q/75|imageslim';
	    }
	    return $url;
	}
	
	public static function delete($url) {
	    $qiniu = new QiniuUtils();
	    $path = $qiniu->path;
	    $result = $qiniu->disk->delete($path.$url);
	    return $result;
	}
}

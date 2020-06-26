<?php 

namespace App\Tools\Utils;

use Illuminate\Support\Facades\Redis;

class RedisGeoUtils {

    //添加点
    public function geoAdd($uin, $lon, $lat) {
        Redis::geoAdd("stalls", $lon, $lat, $uin);
        return true;
    }

    //获取点
    public function geoNearFind($longitude , $latitude , $maxDistance = 0, $unit = 'km') {
        $options = ["WITHDIST", "ASC", "WITHCOORD"]; //显示距离
        $list = Redis::georadius("stalls", $longitude, $latitude , $maxDistance, $unit, $options);
        return $list;
    }

}
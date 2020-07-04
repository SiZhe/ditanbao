<?php

namespace App\Http\Controllers\api\cs;

use App\Models\Stall;
use Illuminate\Support\Facades\Request;
use App\Tools\Utils\QiniuUtils;
use App\Tools\Utils\RedisGeoUtils;
use App\Http\Resources\StallResource;
use App\Http\Resources\StallCollection;
use App\Events\VisitorEvent;
use App\Http\Resources\UserResource;

class StallController extends BaseController {
    
    public function index() {
        /*
         * 马家庄卫生室
         * lon: 115.057093
         * lat: 37.946312
         * 
         * 信誉楼商厦
         * lon: 115.06799
         * lat： 38.023416
         */
        $lon = Request::input('lon');
        $lat = Request::input('lat');
        $categoryId = Request::input('categoryId');
        $name = Request::input('name');
        $stalls = Stall::where('status', Stall::STATUS_OPENING);
        if(!is_null($categoryId)) {
            $stalls = $stalls->where('category_id', $categoryId);
        }
        if(!is_null($name)) {
            $stalls = $stalls->where('name', 'like', '%'.$categoryId.'%');
        }
        $rgu = new RedisGeoUtils();
        $stallIds = $rgu->geoNearFind($lon, $lat);
        $stalls = $stalls->whereIn('id', $stallIds)->paginate(30);
        return $this->respOk(new StallCollection($stalls));
	}
	
	public function store() {
	    $user = $this->user;
	    $input = Request::input();
	    if($user->stall) {
	        return $this->error(self::ERROR_STALL_EXIST);
	    }
	    if(is_null($input['categoryId']) OR is_null($input['name'])) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    $cover = null;
	    if(Request::file('cover')) {
	        $cover = QiniuUtils::save(Request::file('cover'));
	    }
	    $stall = Stall::create([
	        'user_id' => $this->user->id,
	        'category_id' => $input['categoryId'],
	        'name' => $input['name'],
	        'cover' => $cover,
	        'desc' => $input['desc'],
	        'status' => Stall::STATUS_REST,
	    ]);
	    if($stall) {
	        return $this->respOK(new StallResource($stall, true));
	    }
	    return $this->error(self::ERROR_OPERATION);
	    
	}
	
	public function update($stall) {
	    ;
	}
	
	public function open($stall) {
	    if(is_null($stall)) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    if(is_null(Request::input('lon')) OR is_null(Request::input('lat'))) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    $stall->lon = Request::input('lon');
	    $stall->lat = Request::input('lat');
	    $stall->status = Stall::STATUS_OPENING;
	    $stall->save();
	    $redis = new RedisGeoUtils();
	    $redis->geoAdd($stall->id, $stall->lon, $stall->lat);
	    return $this->respOK();
	}
	
	public function rest($stall) {
	    if(is_null($stall)) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    $stall->status = Stall::STATUS_REST;
	    $stall->save();
	    return $this->respOK();
	}
	
	public function show($id) {
	    $stall = Stall::find($id);
	    if(is_null($stall)) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    event(new VisitorEvent($this->user, $stall));
	    return $this->respOK(new StallResource($stall));
	}
	
	public function fans($id) {
	    $stall = Stall::find($id);
	    if(is_null($stall)) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    $fans = $stall->users->paginate(30);
	    return $this->respOK(UserResource::collection($fans));
	}
}

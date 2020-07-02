<?php

namespace App\Http\Controllers\api\cs;

use Illuminate\Support\Facades\Request;
use App\Tools\Utils\QiniuUtils;
use App\Models\Feedback;

class FeedbackController extends BaseController {
    
	public function store() {
	    $input = Request::input();
	    if(is_null($input['content'])) {
	        return $this->error(self::ERROR_PARAMETER);
	    }
	    if(Request::hasFile('thumbnail')) {
	       $input['thumbnail'] = QiniuUtils::save(Request::file('thumbnail'));
	    }
	    $input['user_id'] = $this->user->id;
	    $feedback = Feedback::create($input);
	    if($feedback) {
	        return $this->respOK();
	    }
	    return $this->error(self::ERROR_OPERATION);
	}
}

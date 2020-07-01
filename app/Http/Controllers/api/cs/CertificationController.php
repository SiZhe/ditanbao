<?php

namespace App\Http\Controllers\api\cs;

use Illuminate\Support\Facades\Request;
use App\Models\Stall;
use App\Models\Certification;

class CertificationController extends BaseController {
    
    public function store($id) {
        $stall = Stall::find($id);
        $input = Request::input();
        if(!$stall) {
            return $this->error(self::ERROR_STALL_NOT_EXIST);
        }
        if(is_null($input['fullname']) OR is_null($input['card'])) {
            return $this->error(self::ERROR_PARAMETER);
        }
        $certification = Certification::where('stall_id', $stall->id)->first();
        if($certification) {
            return $this->error(self::ERROR_CERTIFICATION_EXIST);
        }
        Certification::create([
            'stall_id' => $stall->id,
            'fullname' => $input['fullname'],
            'card' => $input['card']
        ]);
        return $this->respOK();
    }
}

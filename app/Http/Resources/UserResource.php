<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'openid' => $this->openid,
            'nickname' => $this->avatarUrl('100x100'),
            'username' => $this->username,
            'hasStall' => $this->stall ? true : false,
            'version' => $this->version,
            'lon' => $this->lon,
            'lat' => $this->lat          
        ];
    }
}

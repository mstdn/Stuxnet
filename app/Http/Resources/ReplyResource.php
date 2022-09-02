<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        =>  $this->id,
            'reply'     =>  $this->reply,
            'time'      =>  $this->created_at->diffForHumans(),
            'avatar'    =>  $this->user->getProfilePhotoUrlAttribute(),
            'username'  =>  $this->user->username,
            'user_id'   =>  $this->user->id,
            'name'      =>  $this->user->name
        ];
    }
}

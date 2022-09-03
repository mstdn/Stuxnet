<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            =>  $this->id,
            'description'   =>  $this->content,
            'time'          =>  $this->created_at->diffForHumans(),
            'file'          =>  '/storage/' . $this->file,
            'avatar'        =>  $this->user->getProfilePhotoUrlAttribute(),
            'username'      =>  $this->user->username,
            'replycount'    =>  $this->replies->count()
        ];
    }
}

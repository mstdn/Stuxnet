<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            =>  $this->id,
            'name'          =>  $this->name,
            'username'      =>  $this->username,
            'avatar'        =>  $this->getProfilePhotoUrlAttribute(),
            'time'          =>  $this->created_at,
            'replies'       =>  ReplyResource::collection($this->whenLoaded('replies')),
            'is'            => [
                'self'          =>  Auth::user() ? Auth::user()->is($this->resource) : null
            ]
        ];
    }
}

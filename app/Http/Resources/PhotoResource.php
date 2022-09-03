<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            =>  $this->id,
            'name'          =>  $this->name,
            'photo'         =>  '/storage/' . $this->photo,
            'time'          =>  $this->created_at->diffForHumans(),
            'category'      =>  CategoryResource::make($this->whenLoaded('category')),
            'user'          =>  UserResource::make($this->whenLoaded('user'))
        ];
    }
}

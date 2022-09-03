<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'link'  =>  $this->link,
            'name'  =>  $this->name
        ];
    }
}

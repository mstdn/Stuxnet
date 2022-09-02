<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        =>  $this->id,
            'name'      =>  $this->name,
            'slug'      =>  $this->slug,
            'count'     =>  $this->posts->count(),
            'can'       =>  [
                'create'    =>  Auth::user() ? Auth::user()->can('create-category', $this->resource) : null,
                'delete'    =>  Auth::user() ? Auth::user()->can('delete-category', $this->resource) : null
            ]
        ];
    }
}

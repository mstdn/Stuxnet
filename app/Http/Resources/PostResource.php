<?php

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            =>  $this->id,
            'title'         =>  $this->title,
            //'slug'          =>  SlugService::createSlug(Post::class, 'slug', $this->title),
            'slug'          =>  $this->slug,
            'description'   =>  $this->description,
            'content'       =>  $this->content,
            'subtitle'      =>  $this->subtitle,
            'file'          =>  '/storage/' . $this->file,
            'file2'         =>  '/storage/' . $this->file2,
            'file3'         =>  '/storage/' . $this->file3,
            'link'          =>  $this->link,
            'time'          =>  $this->created_at->diffForHumans(),
            'category'      =>  $this->category->name,
            'category_id'   =>  $this->category->id,
            'avatar'        =>  $this->user->getProfilePhotoUrlAttribute(),
            'username'      =>  $this->user->username,
            'name'          =>  $this->user->name,
            'replycount'    =>  $this->replies->count(),
            'replies'       =>  ReplyResource::collection($this->whenLoaded('replies')),
            'can'           => [
                'delete'    =>  Auth::user() ? Auth::user()->can('delete-post', $this->resource) : null,
            ]
        ];
    }
}

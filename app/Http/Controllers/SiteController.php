<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoResource;
use App\Http\Resources\PostResource;
use App\Models\Photo;
use App\Models\Post;
use Inertia\Inertia;

class SiteController extends Controller
{
    public function home()
    {
        return Inertia::render('Home', [
            'posts'     =>  PostResource::collection(
                Post::query()
                ->select('id', 'title', 'description', 'file', 'created_at', 'category_id', 'user_id', 'file2', 'file3')
                ->with('user', 'category', 'replies')
                ->paginate(15)
            ),
            'photos'    =>  PhotoResource::collection(
                Photo::query()
                ->select('id', 'name', 'photo', 'created_at', 'user_id')
                ->with('user', 'category', 'replies')
                ->paginate(16)
            )
        ]);
    }

    public function projects()
    {
        return Inertia::render('Projects/Index');
    }

    public function about()
    {
        return Inertia::render('About');
    }

    public function contact()
    {
        return Inertia::render('Contact');
    }
}

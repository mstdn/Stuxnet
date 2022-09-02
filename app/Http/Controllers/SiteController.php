<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return Inertia::render('Home', [
            'posts'     =>  PostResource::collection(
                Post::query()
                ->select('id', 'title', 'description', 'file', 'created_at', 'category_id', 'user_id', 'file2', 'file3')
                ->with('user', 'category')
                ->paginate(3)
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

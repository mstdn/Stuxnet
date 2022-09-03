<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\ReplyResource;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    public function index()
    {
        return Inertia::render('Blogs/Index', [
            'blogs' =>  BlogResource::collection(
                Blog::query()
                    ->select('id', 'content', 'file', 'user_id', 'created_at')
                    ->with('user', 'replies')
                    ->latest()
                    ->paginate(10)
                    ->withQueryString()
            ),
        ]);
    }

    public function store(Request $request)
    {
        $blog = $request->validate([
            'description'   =>  'required|min:1|max:500',
            'file'          =>  ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:500048']
        ]);

        $blog['user_id'] = auth()->id();

        if ($request->hasFile('file')) {
            $blog['file'] = $request->file('file')->store('uploads/' . $blog['user_id'] . '/' . '1', 'public');

            $blog = Blog::create([
                'user_id'       =>  auth()->id(),
                'content'   =>  $request->description,
                'file'          =>  $request->file->store('uploads/' . $blog['user_id'] . '/' . '1', 'public')
            ]);

            return Redirect::route('blogs');
        }

        $blog = Blog::create([
            'user_id'       =>  auth()->id(),
            'content'   =>  $request->description,
        ]);

        return Redirect::route('blogs');
    }

    public function show(Blog $blog)
    {
        return Inertia::render('Blogs/Show', [
            'blog'          =>  BlogResource::make($blog),
            'replies'       =>  ReplyResource::collection(
                $blog->replies()
                ->with('user')
                ->oldest()
                ->paginate(15)
            )
        ]);
    }

    public function destroy(Blog $blog)
    {
        if (!Gate::allows('delete-blog', $blog)) {
            abort(403);
        }

        if (File::exists('storage' . $blog->file)) {
            File::delete('storage' . $blog->file);
        }

        $blog->delete();
        return Redirect::route('blogs');
    }
}

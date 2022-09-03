<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\PostResource;
use App\Http\Resources\ReplyResource;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Nette\Utils\Random;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Posts/Index', [
            'posts' =>  PostResource::collection(
                Post::query()
                    ->select('id', 'description', 'file', 'category_id', 'user_id', 'created_at', 'title', 'link')
                    ->with('user', 'category', 'replies')
                    ->latest()
                    ->paginate(20)
            ),
        ]);
    }

    public function store(Request $request)
    {
        $post = $request->validate([
            'title'         =>  'required|min:1|max:80',
            'subtitle'      =>  'required|min:1|max:80',
            'link'          =>  'nullable|min:1|max:100',
            'content'       =>  'required|min:1|max:5000',
            'description'   =>  'required|min:1|max:500',
            'file'          =>  ['required', 'mimes:jpg,jpeg,png,gif', 'max:500048'],
            'file2'         =>  ['required', 'mimes:jpg,jpeg,png,gif', 'max:500048'],
            'file3'         =>  ['required', 'mimes:jpg,jpeg,png,gif', 'max:500048'],
            'category'      =>  ['required', Rule::exists('categories', 'id')],
        ]);

        $post['user_id'] = auth()->id();
        /* $image = $request->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
     
        $destinationPath = Storage::disk('public')
        $img = Image::make($image->getRealPath());
        $img->resize(1000, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save('uploads/' .$input['imagename'], 80); */

        //$this->postImage->add($input);

        $post = Post::create([
            'user_id'       =>  auth()->id(),
            'title'         =>  $request->title,
            'subtitle'      =>  $request->subtitle,
            'content'       =>  $request->content,
            'link'          =>  $request->link,
            'description'   =>  $request->description,
            'category_id'   =>  $request->category,
            'file'          =>  $request->file->store('uploads/' . $post['user_id'] . '/' . '1', 'public'),
            'file2'         =>  $request->file2->store('uploads/' . $post['user_id'] . '/' . '2', 'public'),
            'file3'         =>  $request->file3->store('uploads/' . $post['user_id'] . '/' . '3', 'public'),
        ]);

        return Redirect::route('projects');
    }

    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post'          =>  PostResource::make($post),
            'replies'       =>  ReplyResource::collection(
                $post->replies()
                    ->with('user')
                    ->oldest()
                    ->paginate(15)
            )
        ]);
    }

    public function destroy(Post $post)
    {
        if (!Gate::allows('delete-post', $post)) {
            abort(403);
        }

        if (File::exists('storage' . $post->file)) {
            File::delete('storage' . $post->file);
        }

        $post->delete();
        return Redirect::route('projects');
    }
}

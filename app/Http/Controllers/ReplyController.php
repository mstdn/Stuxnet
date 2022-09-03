<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReplyController extends Controller
{
    public function PostReply(Request $request, Post $post)
    {
        $reply = $request->validate([
            'reply' => 'required|max:500|min:1'
        ]);
        $reply['user_id'] = auth()->id();
        $reply['post_id'] = $request['post_id'];
        $post->replies()->create($reply);
        return back();
    }

    public function BlogReply(Request $request, Blog $blog)
    {
        $reply = $request->validate([
            'reply' => 'required|max:500|min:1'
        ]);
        $reply['user_id'] = auth()->id();
        $reply['blog_id'] = $request['blog_id'];
        $blog->replies()->create($reply);
        return back();
    }

    public function PhotoReply(Request $request, Photo $photo)
    {
        $reply = $request->validate([
            'reply' => 'required|max:500|min:1'
        ]);
        $reply['user_id'] = auth()->id();
        $reply['photo_id'] = $request['photo_id'];
        $photo->replies()->create($reply);
        return back();
    }

    public function destroy(Reply $reply)
    {
        if (!Gate::allows('delete-reply', $reply)) {
            abort(403);
        }
        $reply->delete();

        return back();
    }
}

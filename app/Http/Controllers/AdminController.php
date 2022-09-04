<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\User;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function users()
    {
        return Inertia::render('Admin/Users', [
            'users'     =>  User::all()
        ]);
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return back();
    }

    public function replies()
    {
        return Inertia::render('Admin/Replies', [
            'replies'     =>  Reply::all()
        ]);
    }

    public function deleteReply(Reply $reply)
    {
        $reply->delete();

        return back();
    }
}

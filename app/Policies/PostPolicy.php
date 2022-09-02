<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function store(User $user)
    {
        return $user->id === 1;
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function destroy(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}

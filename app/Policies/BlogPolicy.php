<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPolicy
{
    use HandlesAuthorization;

    public function store(User $user)
    {
        return $user->id === 1;
    }

    public function update(User $user, Blog $blog)
    {
        return $user->id === $blog->user_id;
    }

    public function destroy(User $user, Blog $blog)
    {
        return $user->id === $blog->user_id;
    }
}

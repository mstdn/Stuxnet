<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
{
    use HandlesAuthorization;

    public function store(User $user)
    {
        return $user->id === 1;
    }

    public function update(User $user, Link $link)
    {
        return $user->id === $link->user_id;
    }

    public function destroy(User $user, Link $link)
    {
        return $user->id === $link->user_id;
    }
}

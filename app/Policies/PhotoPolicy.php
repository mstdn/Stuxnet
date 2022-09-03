<?php

namespace App\Policies;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    public function store(User $user)
    {
        return $user->id === 1;
    }

    public function update(User $user, Photo $photo)
    {
        return $user->id === $photo->user_id;
    }

    public function destroy(User $user, Photo $photo)
    {
        return $user->id === $photo->user_id;
    }
}

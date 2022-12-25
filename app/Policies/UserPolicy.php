<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function view(User $user, User $viewUser)
    {
        return $user->id === $viewUser->id;
    }

    public function update(User $user, User $updateUser)
    {
        return $user->id === $updateUser->id;
    }

    public function delete(User $user, User $deleteUser)
    {
        return $user->id === $deleteUser->id;
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role, User::$role);
    }

    public function notAdmin(User $user): bool
    {
        return !in_array($user->role, ['admin']);
    }

    public function notEmployee(User $user): bool
    {
        return !in_array($user->role, ['employee']);
    }

    public function onlyOwner(User $user): bool
    {
        return $user->role === 'owner';
    }

}

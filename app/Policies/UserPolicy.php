<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function admin(User $user) {
        return $user->role() == 'admin';
    }

    public function editor(User $user) {
        return $this->admin($user) || $user->role() == 'editor';
    }

    public function owner(User $user, User $owner) {
        return $this->admin($user) || ($owner->id == $user->id);
    }
}

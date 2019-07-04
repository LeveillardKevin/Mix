<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Music;
use Illuminate\Auth\Access\HandlesAuthorization;

class MusicPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->admin){
            return true;
        }
    }

    public function manage(User $user, Music $music)
    {
        return $user->id === $music->user_id;
    }
}

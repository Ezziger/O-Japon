<?php

namespace App\Policies;

use App\Models\Lieu;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LieuPolicy
{
    use HandlesAuthorization;

    public function before(User $user) {
        if ($user->estAdministrateur()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Lieu  $lieu
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Lieu  $lieu
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Lieu $lieu)
    {
        return $user->id == $lieu->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Lieu  $lieu
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Lieu $lieu)
    {
        return $user->id == $lieu->user_id;
    }
}

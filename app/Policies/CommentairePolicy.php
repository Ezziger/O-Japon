<?php

namespace App\Policies;

use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentairePolicy
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
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Commentaire $commentaire)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Commentaire $commentaire)
    {
        return $user->id == $commentaire->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Commentaire $commentaire)
    {
        return $user->id == $commentaire->user_id;
    }
}

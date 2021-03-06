<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'pseudo',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lieux() {
        return $this->hasMany(Lieu::class);
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function estAdministrateur() {
        return $this->role->nom == 'administrateur';
    }

    /***** FAVORIS *****/

    public function favoris () {
        return $this->belongsToMany(Lieu::class, 'favoris');
    }

    public function isInFavorites (Lieu $lieu) {
        return $lieu->users()->where('user_id', $this->id)->exists();
    }

}

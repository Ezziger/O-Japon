<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'image',
        'nom',
        'prix',
        'map',
        'password',
        'user_id',
        'categorie_id',
        'region_id'
    ];

    public function categorie() {
        return $this->hasOne(Categorie::class);
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class)->whereNull('parent_id');
    }

    public function region() {
        return $this->hasOne(Region::class);
    }

    public function lieu() {
        return $this->belongsTo(User::class);
    }

/* A faire vérifier (comptage des commentaires + reponses) */
    public function commentaires_reponses() {
        return $this->hasMany(Commentaire::class); 
    }
}

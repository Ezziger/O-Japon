<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    
    protected $fillable = [
        'commentaire',
        'user_id',
        'lieu_id',
        'parent_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function lieu() {
        return $this->belongsTo(Lieu::class);
    }

    public function replies() {
        return $this->hasMany(Commentaire::class, 'parent_id');
    }

}

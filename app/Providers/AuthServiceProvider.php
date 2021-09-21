<?php

namespace App\Providers;

use App\Policies\CommentairePolicy;
use App\Policies\LieuPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
        Lieu::class => LieuPolicy::class, //On passe en clé la classe du model Lieu, et on lui applique la classe de la policy LieuPolicy
        Commentaire::class => CommentairePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

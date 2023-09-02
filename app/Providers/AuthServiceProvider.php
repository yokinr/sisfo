<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Dokument;
use App\Models\User;
use App\Policies\DokumentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Dokument::class => DokumentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('Super Admin', function (User $user) {
            return $user->peran_id_str === 'Super Admin';
        });

        Gate::define('admin', function (User $user) {
            return $user->peran_id_str === 'Operator Sekolah';
        });

        Gate::define('Peserta Didik', function (User $user) {
            return $user->peran_id_str === 'Peserta Didik';
        });
    }
}

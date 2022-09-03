<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\BlogPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\LinkPolicy;
use App\Policies\PhotoPolicy;
use App\Policies\PostPolicy;
use App\Policies\ReplyPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-post', [PostPolicy::class, 'store']);
        Gate::define('delete-post', [PostPolicy::class, 'destroy']);
        Gate::define('delete-reply', [ReplyPolicy::class, 'destroy']);
        Gate::define('delete-category', [CategoryPolicy::class, 'destroy']);
        Gate::define('create-category', [CategoryPolicy::class, 'store']);
        Gate::define('delete-blog', [BlogPolicy::class, 'destroy']);
        Gate::define('create-blog', [BlogPolicy::class, 'store']);
        Gate::define('create-link', [LinkPolicy::class, 'store']);
        Gate::define('delete-link', [LinkPolicy::class, 'destroy']);
        Gate::define('create-photo', [PhotoPolicy::class, 'store']);
        Gate::define('delete-photo', [PhotoPolicy::class, 'destroy']);
    }
}

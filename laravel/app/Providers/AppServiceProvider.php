<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\Interfaces\IAnswerRepository;
use App\Repositories\Interfaces\ICategoryRepository;
use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\AnswerRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\Interfaces\IPermissionRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IAnswerRepository::class, AnswerRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IPermissionRepository::class, PermissionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

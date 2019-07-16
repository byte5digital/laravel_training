<?php

namespace App\Providers;

use App\Http\Repositories\ProjectRepositoryInterface;
use App\Http\Repositories\ProjectRepositoryMySql;
use App\Http\Repositories\ProjectRepositoryRestFul;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepositoryRestFul::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

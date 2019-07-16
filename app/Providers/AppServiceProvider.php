<?php

namespace App\Providers;

use App\Http\Repositories\ProjectRepositoryInterface;
use App\Http\Repositories\ProjectRepositoryDatabase;
use App\Http\Repositories\ProjectRepositoryRestFul;
use App\Http\Repositories\SubTaskRepositoryDatabase;
use App\Http\Repositories\SubTaskRepositoryInterface;
use App\Http\Repositories\TaskRepositoryDatabase;
use App\Http\Repositories\TaskRepositoryInterface;
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
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepositoryDatabase::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepositoryDatabase::class);
        $this->app->bind(SubTaskRepositoryInterface::class, SubTaskRepositoryDatabase::class);
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

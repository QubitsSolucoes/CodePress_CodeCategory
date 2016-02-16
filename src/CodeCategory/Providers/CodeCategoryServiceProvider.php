<?php

namespace CodePress\CodeCategory\Providers;


use Illuminate\Support\ServiceProvider;
use CodePress\CodeCategory\Repository\CategoryRepositoryInterface;
use CodePress\CodeCategory\Repository\CategoryRepositoryEloquent;

class CodeCategoryServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([__DIR__ . '/../../resources/migrations/' => base_path('database/migrations')], 'migrations');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/codecategory', 'codecategory');
        require __DIR__ . '/../routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //$this->app->bind(CategoryRepositoryInterface::class,CategoryRepositoryEloquent::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepositoryDoctrine::class);
    }
}
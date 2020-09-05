<?php

namespace App\Providers;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Product\ProductTypeRepositoryInterface;
use App\Repositories\Product\ProductDetailsRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductTypeRepository;
use App\Repositories\Product\ProductDetailsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductTypeRepositoryInterface::class, ProductTypeRepository::class);
        $this->app->bind(ProductDetailsRepositoryInterface::class, ProductDetailsRepository::class);
    }
}

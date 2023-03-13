<?php

namespace App\Providers;

use App\Repositories\AuthenticateRepository;
use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\Interface\AuthenticateRepositoryInterface;
use App\Repositories\Interface\CartRepositoryInterface;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\ProductRepositoriesInterface;
use App\Repositories\Interface\UsersRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CategoryRepositoryInterface::class => CategoryRepository::class,
        ProductRepositoriesInterface::class => ProductRepository::class,
        CartRepositoryInterface::class => CartRepository::class,
        UsersRepositoryInterface::class => UsersRepository::class,
        AuthenticateRepositoryInterface::class => AuthenticateRepository::class,
        // key => value
    ];
    public function register()
    {
        // $this->app->bind(
        //     'App\Repositories\Interface\CategoryRepositoryInterface',
        //     'App\Repositories\CategoryRepository'
        // );
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

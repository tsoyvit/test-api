<?php

namespace App\Providers;

use App\Repositories\Api\IncomeRepositoryApi;
use App\Repositories\Api\OrderRepositoryApi;
use App\Repositories\Api\SaleRepositoryApi;
use App\Repositories\Api\StockRepositoryApi;
use App\Repositories\Interfaces\IncomeRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\SaleRepositoryInterface;
use App\Repositories\Interfaces\StockRepositoryInterface;
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
        $this->app->bind(IncomeRepositoryInterface::class, IncomeRepositoryApi::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepositoryApi::class);
        $this->app->bind(SaleRepositoryInterface::class, SaleRepositoryApi::class);
        $this->app->bind(StockRepositoryInterface::class, StockRepositoryApi::class);
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

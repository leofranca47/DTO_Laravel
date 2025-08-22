<?php

namespace App\Providers;

use App\Adapters\Contracts\InsereClienteAdapterInterface;
use App\Adapters\InsereClienteAdapter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(
            InsereClienteAdapterInterface::class,
            InsereClienteAdapter::class
        );
    }
}

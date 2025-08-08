<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->routes(function () {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        Route::middleware('web')
            ->group(base_path('routes/brand.php'));

        Route::middleware('web')
            ->group(base_path('routes/product.php'));

        Route::middleware('web')
            ->group(base_path('routes/order.php'));

        Route::middleware('web')
            ->group(base_path('routes/user.php'));
        // });
    }
}

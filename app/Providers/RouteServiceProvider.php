<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * @var string|null
     */
    protected $namespace = "App\\Http\\Controllers";

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::namespace($this->namespace)
                ->middleware('api')
                ->group(function () {
                    Route::namespace('openeds')
                        ->group(base_path('routes/openeds.php'));

                    Route::namespace('closeds')
                        ->group(function () {
                            Route::namespace('backoffice')
                                ->prefix('backoffice')->group(function () {
                                    Route::prefix('users')
                                        ->group(base_path('routes/closeds/backoffice/users.php'));
                                });

                            Route::namespace('erp')
                                ->prefix('erp')
                                ->group(base_path('routes/closeds/erp/peoples.php'));
                        });
                });

            /* Route::middleware('web')
                ->group(base_path('routes/web.php')); */
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}

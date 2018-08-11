<?php

namespace App\Infrastructure\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App';

    /**
     * Authenitcation Routes Path
     *
     * @var string
     */
    protected $authenticationRoutes = "/Infrastructure/Authentication/Routes/*.php";

    /**
     * Domain Routes Path
     *
     * @var string
     */
    protected $domainRoutes = "/Domain/**/Routes/**/*.php";

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAuthenticationRoutes();

        $this->mapDomainRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Authentication Routes
     *
     * @return void
     */
    protected function mapAuthenticationRoutes()
    {
        foreach(glob(app_path($this->authenticationRoutes)) as $router) {
            $type = last(explode('/', $router));
            $version = strtolower(config('app.version'));
            $middleware = str_replace('.php', '', $type);
            $prefix = $type === 'api.php' ? 'api' : '';
            $namespace = str_replace([app_path() . '/', 'Routes', '/' . $type, '/'], ['', 'Controllers', '', '\\'], $router);

            Route::prefix($prefix . '/' . $version)
                ->middleware($middleware)
                ->namespace($this->namespace . $namespace)
                ->group($router);
        }
    }

    /**
     * Domain Routes
     *
     * @return void
     */
    protected function mapDomainRoutes()
    { 
        foreach(glob(app_path($this->domainRoutes)) as $router) {
            $type = last(explode('/', $router));
            $version = array_reverse(explode('/', $router))[1];
            $middleware = str_replace('.php', '', $type);
            $prefix = $type === 'api.php' ? 'api/' . lcfirst($version) : '';
            $namespace = str_replace([app_path() . '/', 'Routes', '/' . $type, '/'], ['', 'Controllers', '', '\\'], $router);

            Route::prefix($prefix)
                ->middleware($middleware)
                ->namespace($this->namespace . $namespace)
                ->group($router);
        }
    }
}

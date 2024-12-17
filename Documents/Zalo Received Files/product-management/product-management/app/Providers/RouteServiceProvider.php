<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Các namespace được sử dụng cho các route trong ứng dụng.
     *
     * @var string
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Đăng ký tất cả các route cho ứng dụng.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Đăng ký các route cho ứng dụng.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes(); // Đăng ký route API
        $this->mapWebRoutes(); // Đăng ký route web
    }

    /**
     * Đăng ký các route cho API.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php')); // Đảm bảo gọi file api.php
    }

    /**
     * Đăng ký các route cho web.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php')); // Đảm bảo gọi file web.php
    }
}

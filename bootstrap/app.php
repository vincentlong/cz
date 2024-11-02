<?php

use App\Middleware\AllowCrossDomain;
use App\Exception\HttpResponseException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Common\Service\JsonService;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            Route::prefix('api')
                ->group(app_path('Api/Route/index.php'));
            Route::prefix('adminapi')
                ->middleware([
                   \App\Adminapi\Middleware\InitMiddleware::class,
                   \App\Adminapi\Middleware\LoginMiddleware::class,
                ])
                ->group(app_path('Adminapi/Route/index.php'));
            Route::prefix('/')
                ->group(base_path('routes/web.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        // 全局跨域中间件
        $middleware->append(AllowCrossDomain::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (HttpResponseException $e) {
            return response()->json($e->getResData(), $e->getCode());
        });
        $exceptions->render(function (ValidationException $e) {
            return JsonService::throw($e->validator->errors()->first());
        });
    })->create();

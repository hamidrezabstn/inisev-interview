<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
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
        Response::macro('success', function (string $data,int $status=200, string $message="") {
            return Response::json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ], $status);
        });

        Response::macro('error', function (string $error,int $status=400) {
            return Response::json([
                'success' => false,
                'message' => $error,
            ], $status);
        });
    }
}

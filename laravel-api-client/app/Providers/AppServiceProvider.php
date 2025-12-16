<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http; // <<< import

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Http::macro('api', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
            ])->baseUrl(config('services.api.base_uri'));
        });
    }
}

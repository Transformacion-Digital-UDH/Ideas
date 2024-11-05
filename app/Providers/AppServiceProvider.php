<?php

namespace App\Providers;

use App\Models\Propuestas;
use App\Observers\EstadoPropuestaObserver;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Route::middleware(config('jetstream.middleware', ['web']))
            ->group(base_path('routes/jetstream.php'));
        Route::middleware(config('fortify.middleware', ['web']))
            ->group(base_path('routes/fortify.php'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Propuestas::observe(EstadoPropuestaObserver::class);
        Request::macro('hasValidSignature', function () {
            $uploading = strpos(URL::current(), '/livewire/upload-file');
            $previewing = strpos(URL::current(), '/livewire/preview-file');
            if ($uploading || $previewing) {
                return true;
            }
        });
    }
}

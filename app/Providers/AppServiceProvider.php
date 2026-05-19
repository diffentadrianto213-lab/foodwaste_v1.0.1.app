<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- Ini yang baru ditambahkan

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
        // <-- Baris di bawah ini memaksa aset menggunakan HTTPS di Railway
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
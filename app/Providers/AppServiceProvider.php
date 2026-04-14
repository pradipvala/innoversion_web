<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Whatsapp;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        $whatsapp = null;
        $countryCodes = [];

        if (Schema::hasTable('whatsapp')) {
            $whatsapp = Whatsapp::first();
        }

        $countryCodes = Country::pluck('country_name', 'phonecode')->toArray();

        View::share('whatsapp', $whatsapp);
        View::share('countryCodes', $countryCodes);
    }
}

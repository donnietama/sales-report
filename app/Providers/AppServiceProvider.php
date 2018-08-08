<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191); # Set default string length.

        # Disable query logging on production.
        if ( env( 'APP_ENV', 'local' ) !== 'local' )
        {
            \DB::connection()->disableQueryLog();
        }
    }

    public function register()
    {
        //
    }
}

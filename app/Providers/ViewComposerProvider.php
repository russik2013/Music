<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('category_filter', 'App\Http\Controllers\Publics\CategoryController@categoryFilter');
        view()->composer('header_menu', 'App\Http\Controllers\Publics\OperationController@headerMenu');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

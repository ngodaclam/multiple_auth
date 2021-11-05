<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.contentLayoutMaster', function ($view) {
            $verticalMenuForAdmin = 'resources/data/menu-data/verticalMenu.json';
            $verticalMenuForPartner = 'resources/data/menu-data/verticalMenuForPartner.json';
            // get all data from menu.json file
            $verticalMenuJson = file_get_contents(base_path(auth()->user()->type == 1 ? $verticalMenuForAdmin : $verticalMenuForPartner));

            // Share all menuData to all the views
            $verticalMenuData = json_decode($verticalMenuJson);
            $horizontalMenuJson = file_get_contents(base_path('resources/data/menu-data/horizontalMenu.json'));
            $horizontalMenuData = json_decode($horizontalMenuJson);
            \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
        });
    }
}

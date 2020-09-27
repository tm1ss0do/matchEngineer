<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\SidebarComposer;


class ComposerServiceProvider extends ServiceProvider
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
        //
        // View::composers([
        //   SidebarComposer::class    => 'mypages.applied',
        // ]);
        View::composer(
            ['mypages.applied', 'mypages.registered', 'mypages.pm_list', 'mypages.dm_list'],
            SidebarComposer::class
        );
        // View::composer(
        //     'welcome', 'App\Http\ViewComposers\SidebarComposer'
        // );
        // View::composer('welcome', SidebarComposer::class);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Player;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Gate::define('admin', function(Player $player){
            return $player->status === 'Admin';
        });

        Gate::define('penpos', function(Player $player) {
            return $player->status === 'Penjaga';
        });
    }
}
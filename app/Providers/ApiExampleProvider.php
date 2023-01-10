<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApiExampleProvider extends ServiceProvider{
     /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('api-example', function(){
            return Http::withOption([
                'verify'=>false,
                'base_uri'=>'http://616d6bdb6dacbb001794ca17.mockapi.io/devnology/brazilian_provider'
            ])->withHeaders([
                'Authorization' => 'Bearer',
            ]);
        });
    }

}
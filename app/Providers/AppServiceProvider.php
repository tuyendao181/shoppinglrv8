<?php

namespace App\Providers;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;

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
        view()->composer("*",function($view){
            // $homecats=Category::orderBy('name', 'ASC')->get();
            $cart=new Cart();
            $view->with(compact('cart'));
        });
    }
}

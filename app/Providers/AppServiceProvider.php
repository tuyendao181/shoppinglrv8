<?php

namespace App\Providers;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


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
        Paginator::useBootstrap();
        view()->composer("*",function($view){
            // $homecats=Category::orderBy('name', 'ASC')->get();
            $cart=new Cart();
            $category = Category::all();
            $view->with(compact('cart','category'));
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            $loaisp = ProductType::all();
            $view->with('loaisp', $loaisp);
        });

        /*view()->composer(['page.header'],function($view){
            $loai_sp=ProductType::all();
            $view->with('loai2_sp',$loai2_sp);
        });*/
        view()->composer('cart',function($view){
             if(Session('cart'))
            {
                $oldCart = Session::get('cart');// lấy giỏ hàng hiện tại gán vào giỏ hàng củ
                $cart =new Cart($oldCart);
                $view->with([
                            'cart'          => Session::get('cart'),
                            'product_cart'   => $cart->items,
                            'totalprice'    => $cart->totalPrice,
                            'totalQty'      => $cart->totalQty
                ]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer(['clients.*', '*'], function ($view) {
            // Chia sẻ danh sách danh mục với tất cả các view
            $categories = Category::withCount('products')->orderBy('name')->get();
            $view->with('categories', $categories);

            // Kiểm tra nếu người dùng đã đăng nhập
            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::user()->id)->get();
                $cartQuantity = $cart->sum('quantity');
                $cartProducts = $cart->map(function ($item) {
                    $product = Product::find($item->product_id);
                    $product->quantity = $item->quantity;
                    $product->total = $product->price * $item->quantity;
                    $product->images = json_decode($product->images);
                    return $product;
                });
                $cartProducts = $cartProducts->toArray();
                $cartTotal = collect($cartProducts)->sum(function ($product) {
                    return $product['price'] * $product['quantity'];
                });

                $view->with('cartQuantity', $cartQuantity);
                $view->with('cartTotal', $cartTotal);
                $view->with('cartProducts', $cartProducts);
            } else {
                $view->with('cartQuantity', 0);
                $view->with('cartTotal', 0);
                $view->with('cartProducts', []);
            }
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

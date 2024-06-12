<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('clients.cart');
    }

    public function store(Request $request, Product $product)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function destroy(Product $product)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        $cart->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function remove(Product $product)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        $cart->quantity -= 1;
        if ($cart->quantity == 0) {
            $cart->delete();
        } else {
            $cart->save();
        }
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }

    public function add(Product $product)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        $cart->quantity += 1;
        $cart->save();
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}

<?php

namespace App\Http\Controllers\Clients;

use App\Models\Cart;
use App\Models\Billing;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->get();
        if ($cart->isEmpty()) {
            return redirect()->route('cart.index');
        }
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
        $productsId = $cart->pluck('product_id');

        return view(
            'clients.checkout',
            [
                'active' => 'checkout',
                'cartProducts' => $cartProducts,
                'cartTotal' => $cartTotal,
                'productsId' => $productsId,
                'user' => $user
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required',
            'shipping' => 'required',
            'total' => 'required',
            'user_id' => 'required'
        ]);

        $products = $request->products;
        $shipping = $request->shipping;
        $total = $request->total;
        $userId = $request->user_id;

        $cart = Cart::where('user_id', $userId)->get();
        $cart->each(function ($item) {
            $item->delete();
        });

        $checkout = Checkout::create([
            'user_id' => $userId,
            'total' => $total
        ]);

        $products = json_decode($products, true);
        foreach ($products as $product) {
            $billing = Billing::create([
                'user_id' => $userId,
                'checkout_id' => $checkout->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity']
            ]);
        }

        return redirect()->route('profile.orders');
    }

    public function cancel(Checkout $checkout)
    {
        $checkout->status = 'canceled';
        $checkout->save();

        return redirect()->route('profile.orders');
    }
}

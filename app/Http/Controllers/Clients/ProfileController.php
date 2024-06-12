<?php

namespace App\Http\Controllers\Clients;

use App\Models\Billing;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view(
            'clients.profiles.index',
            [
                'active' => 'profile',
                'user' => $user
            ]
        );
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = Checkout::where('user_id', $user->id)->paginate(10);

        return view(
            'clients.profiles.orders',
            [
                'active' => 'orders',
                'orders' => $orders,
            ]
        );
    }
    public function orderdetail(Checkout $order)
    {
        $user = Auth::user();
        $billing = Billing::where('checkout_id', $order->id)->get();
        $products = [];
        foreach ($billing as $item) {
            $product = Product::find($item->product_id);
            $product->quantity = $item->quantity;
            $products[] = $product;
        }

        return view(
            'clients.profiles.orderdetail',
            [
                'active' => 'orders',
                'user' => $user,
                'order' => $order,
                'products' => $products,
            ]
        );
    }
}

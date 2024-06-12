<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $productsDeal = Product::with('images', 'category')->productDeal(5)->get();
        $productsArrival = Product::with('images', 'category')->productArrival(10)->get();
        $productsTrending = Product::with('images', 'category')->productTrending(3)->get();
        $productsRated = Product::with('images', 'category')->productRated(3)->get();
        $productsViewed = Product::with('images', 'category')->productViewed(3)->get();

        return view('clients.home', [
            'active' => 'home',
            'productsDeal' => $productsDeal,
            'productsArrival' => $productsArrival,
            'productsTrending' => $productsTrending,
            'productsRated' => $productsRated,
            'productsViewed' => $productsViewed
        ]);
    }
}

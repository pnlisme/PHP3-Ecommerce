<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function GuzzleHttp\default_ca_bundle;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $products = Product::with('images', 'category')->when(
            $request->has('search'),
            fn ($query) => $query->productSearch($search)
        );

        $categories = request()->input('category');
        $products = $products->when(
            $categories,
            fn ($query) => $query->productCategory($categories)
        );

        $filterPrice = [
            '10' => '0$ - 10$',
            '20' => '10$ - 20$',
            '50' => '20$ - 50$',
            '100' => '50$ - 100$',
            '200' => '100$ - 200$',
            '999999' => '200$ +',
        ];

        $price = request()->input('price');
        $price = match ($price) {
            '10' => [0, 10],
            '20' => [10, 20],
            '50' => [20, 50],
            '100' => [50, 100],
            '200' => [100, 200],
            '999999' => [200, 999999],
            default => null,
        };
        $products = $products->when(
            $price,
            fn ($query) => $query->productPrice($price)
        );
        // dd(request()->input('sortby'));
        $sort = request()->input('sortby');
        $products = match ($sort) {
            'sale' => $products->productSort('price_fake', 'desc'),
            'hot' => $products->productSort('quantity', 'desc'),
            'rating' => $products->productSort('rating', 'desc'),
            'view' => $products->productSort('view', 'desc'),
            'name (asc)' => $products->productSort('name', 'asc'),
            'name (desc)' => $products->productSort('name', 'desc'),
            'price (asc)' => $products->productSort('price', 'asc'),
            'price (desc)' => $products->productSort('price', 'desc'),
            default => $products->latest(),
        };

        $products = $products->paginate(15)->appends(request()->query());

        return view('clients.products.index', [
            'active' => 'products',
            'filterPrice' => $filterPrice,
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        $products = Product::productRelated($product->category_id, $product->id, 5)->get();

        return view('clients.products.show', [
            'active' => 'products',
            'product' => $product,
            'products' => $products
        ]);
    }
}

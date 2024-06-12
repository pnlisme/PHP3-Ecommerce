<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->get();
        $products = Product::whereIn('id', $wishlist->pluck('product_id'))->paginate(10);

        return view('clients.wishlist', [
            'active' => 'wishlist',
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->has('product')) {
            $id = $request->input('product');
        }

        if (Wishlist::where('product_id', $id)->where('user_id', auth()->user()->id)->exists()) {
            return back()->with('error', 'Product already in wishlist!');
        }

        Wishlist::create([
            'product_id' => $id,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with('success', 'Product added to wishlist!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wishlist = Wishlist::where('product_id', $id)->where('user_id', auth()->user()->id)->first();
        if ($wishlist->delete()) {
            return redirect()->back()->with('success', 'Product deleted from wishlist!');
        }
        return redirect()->back()->with('error', 'Failed to delete product from wishlist!');
    }
}

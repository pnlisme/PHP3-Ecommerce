<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $userTotal = User::count();
        $priceTotal = Checkout::sum('total');
        $productActive = Product::where('status', 1)->count();
        $categories = Category::withCount('products')->get();
        foreach ($categories as $category) {
            $categoriesName[] = $category->name;
            $categoriesTotal[] = $category->products_count;
        }


        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'userTotal' => $userTotal,
            'priceTotal' => $priceTotal,
            'productActive' => $productActive,
            'categoriesName' => json_encode($categoriesName),
            'categoriesTotal' => json_encode($categoriesTotal),
        ]);
    }
}

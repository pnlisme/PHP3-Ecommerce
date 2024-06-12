<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('products')->orderBy('name')->get();
        return view('admin.categories.index', [
            'title' => 'Categories',
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create', ['title' => 'Create Category']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:40',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,svg+xml|max:2048'
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons', 'public');
        }

        Category::create([
            ...$request->except('icon'),
            'icon' => $path ?? null
        ]);
        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => 'Edit Category',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:40',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,svg+xml|max:2048'
        ]);

        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('icons', 'public');
            $category->icon && unlink(storage_path('app/public/' . $category->icon));
        }

        $category->update([
            ...$request->except('icon'),
            'icon' => $path ?? $category->icon
        ]);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->products->isEmpty()) {
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully!');
        }
        return redirect()->back()->with('error', 'Category deleted failed! Existed products in this category.');
    }
}

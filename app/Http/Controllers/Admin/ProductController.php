<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'images')->latest()->paginate(10);
        return view('admin.products.index', [
            'title' => 'Products',
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', [
            'title' => 'Create Product',
            'categories' => $categories,
            'product' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validate([
            'imageCreate.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,svg+xml,avif|max:2048'
        ]);

        $product = Product::create($request->validated());

        if ($request->hasFile('imageCreate')) {
            foreach ($request->file('imageCreate') as $image) {
                $path = $image->store('images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'name' => $path
                ]);
            }
        }
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
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
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        $product->load('images', 'category');

        return view('admin.products.edit', [
            'title' => 'Edit Product',
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {

        // Validate the request data
        $validatedData = $request->validated();

        // Check if there are any images to delete
        if ($request->has('imageDestroy')) {
            foreach ($request->input('imageDestroy') as $imageId) {
                $image = $product->images()->find($imageId);
                if ($image) {
                    // Remove the image file from storage
                    // Storage::delete($image->path);
                    // Delete the image record from the database
                    $image->delete();
                }
            }
        }

        // Handle file uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images');
                $product->images()->create(['path' => $path]);
            }
        }

        // Save the updated product
        $product->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}

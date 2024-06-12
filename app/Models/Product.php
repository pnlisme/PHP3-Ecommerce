<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'price_fake',
        'quantity',
        'description',
        'content',
        'status',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function scopeProductDeal($query, $limit)
    {
        return $query->where('price_fake', '>', 0)->orderBy('price_fake', 'desc')->limit($limit);
    }

    public function scopeProductArrival($query, $limit)
    {
        return $query->orderBy('created_at', 'desc')->limit($limit);
    }

    public function scopeProductTrending($query, $limit)
    {
        return $query->orderBy('quantity', 'desc')->limit($limit);
    }

    public function scopeProductRated($query, $limit)
    {
        return $query->orderBy('rating', 'desc')->limit($limit);
    }

    public function scopeProductViewed($query, $limit)
    {
        return $query->orderBy('view', 'desc')->limit($limit);
    }

    public function scopeProductSearch($query, $keyword)
    {
        return $query->where('name', 'like', '%' . $keyword . '%');
    }

    public function scopeProductCategory($query, $category_name)
    {
        return $query->whereHas('category', function ($query) use ($category_name) {
            $query->whereIn('name', $category_name);
        });
    }

    public function scopeProductPrice($query, $price)
    {
        return $query->whereBetween('price', $price);
    }

    public function scopeProductSort($query, $sort, $order)
    {
        return $query->orderBy($sort, $order);
    }

    public function scopeProductRelated($query, $category_id, $product_id, $limit)
    {
        return $query->where('category_id', $category_id)->where('id', '!=', $product_id)->limit($limit);
    }
}

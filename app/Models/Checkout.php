<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'billing_id',
        'shipping',
        'total',
        'user_id',
    ];

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

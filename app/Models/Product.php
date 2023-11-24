<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Rating;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'image',
        'price',
        'waiting_time',
        'view_count'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function rating() {
        return $this->hasMany(Rating::class);
    }
}

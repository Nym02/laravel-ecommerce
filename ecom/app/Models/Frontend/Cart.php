<?php

namespace App\Models\Frontend;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    public $fillable = [
        'product_id',
        'user_id',
        'order_id',
        'ip_address',
        'product_quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function totalCarts()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::id())->where('order_id', Null)->get();
        } else {
            $carts = Cart::where('user_id', Request()->ip())->where('oder_id', NULL)->get();
        }
    }
}

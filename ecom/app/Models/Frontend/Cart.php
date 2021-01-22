<?php

namespace App\Models\Frontend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    // public $totalItemCost = 0;

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
            $carts = Cart::where('ip_address', Request()->ip())->where('oder_id', NULL)->get();
        }
        return $carts;
    }

    public static function totalItems()
    {
        if (Auth::check()) {
            $carts = Cart::where('ip_address', Request()->ip())->where('order_id', Null)->get();
        } else {
            $carts = Cart::where('ip_address', Request()->ip())->where('order_id', NULL)->get();
        }

        $total_items = 0;

        foreach ($carts as $cart) {
            $total_items += $cart->product_quantity;
        }
        return $total_items;
    }


    public static function totalPrice()
    {
        if (Auth::check()) {
            $carts = Cart::where('ip_address', Request()->ip())->where('order_id', Null)->get();
        } else {
            $carts = Cart::where('ip_address', Request()->ip())->where('order_id', NULL)->get();
        }
        $totalItemCost = 0;
        foreach ($carts as $cart) {
            if (!is_null($cart->product->product_offer_price)) {
                $totalItemCost += $cart->product_quantity * $cart->product->product_offer_price;
            } else if (is_null($cart->product->product_offer_price)) {
                $totalItemCost += $cart->product_quantity * $cart->product->product_price;
            }
        }
        return $totalItemCost;
    }
}

<?php

namespace App\Models\Frontend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'ip_address',
        'customer_name',
        'customer_phone_no',
        'customer_email',
        'customer_shipping_address',
        'customer_message',
        'is_paid',
        'is_complete',
        'seen_by_admin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}

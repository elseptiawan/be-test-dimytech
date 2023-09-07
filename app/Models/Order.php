<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'product_id', 'payment_method_id', 'customer_address_id', 'quantity', 'total_price'];

    protected $casts = [
        'customer_id' => 'array',
        'product_id' => 'array',
        'payment_method_id' => 'array',
        'quantity' => 'array',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

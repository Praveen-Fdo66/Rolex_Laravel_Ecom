<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'orders';

    protected $fillable = [
        'user_id', 'watch_id', 'price', 'status', 'reserved_at',
        'customer_name', 'customer_email', 'customer_phone', 'customer_address',
    ];

    public function product()
{
    return $this->belongsTo(Product::class, 'watch_id', '_id'); // for MongoDB, use '_id' 
}
}

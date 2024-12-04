<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'adress', 'city', 'phone', 'email', 'postcode', 'Ordernote', 'total_amount', 'quantity'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

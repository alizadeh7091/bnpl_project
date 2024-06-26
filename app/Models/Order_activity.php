<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_activity extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','customer_id','status'];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','service_id','price','payment_type','status'];
    public function service()
    {
        return $this->hasOne(Service::class);
    }
    public function order_activities()
    {
        return $this->hasMany(Order_activity::class);
    }
    public function loan()
    {
        return $this->hasOne(Loan::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

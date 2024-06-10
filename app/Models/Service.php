<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public  function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}

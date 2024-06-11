<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','amount','installment_count','installment_amount','start_date'];
    use HasFactory;
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}


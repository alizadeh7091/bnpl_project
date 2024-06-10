<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

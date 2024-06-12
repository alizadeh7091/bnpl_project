<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $fillable = ['loan_id','amount','installment_number','installment_amount','due_date','pay_date','delay_penalty'];
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

}


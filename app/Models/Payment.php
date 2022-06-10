<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_method',
        'payment_status',
        'proof_of_payment',
        'amount',
        'occupant_id',
        'created_at',
    ];

    public function occupant()
    {
        return $this->belongsTo(Occupant::class);
    }
}

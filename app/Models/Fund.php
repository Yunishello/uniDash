<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $fillable = [
        'amount',
        'wallet',
        'paidOn',
        'paymentDisc',
        'paymentRef',
        'paymentStatus',
        'transactionHash',
        'transactionRef',
        'user_id'
    ];
}

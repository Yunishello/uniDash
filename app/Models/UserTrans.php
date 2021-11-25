<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTrans extends Model
{
    protected $fillable = [
        'status',
        'product_name',
        'phone',
        'amount',
        'trans_date',
        'reqId'
    ];
}

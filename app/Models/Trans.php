<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Trans extends Model
{
    // use SoftDeletes;
    protected $fillable = [
        'status',
        'product_name',
        'phone',
        'amount',
        'trans_id',
        'trans_date',
        'reqId',
        'user_id'
    ];
}

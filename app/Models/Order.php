<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'partner_id',
        'item_id',
        'amount',
        'invoice_no',
        'coupon_code',
        'status',
        'pti_status',
    ];

    const STATUS_FALSE = 0;
    const STATUS_SUCCESS = 1;
    const STATUS_PROCESSING = 2;

    const STATUS_PTI_PROCESSING = 0;
    const STATUS_PTI_SUCCESS = 1;
}

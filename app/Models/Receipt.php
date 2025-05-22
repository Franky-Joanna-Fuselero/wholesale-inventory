<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'customer_id',
        'purchased_at',
        'total_amount',
    ];

    public function customer()
{
    return $this->belongsTo(Customer::class);
}

}

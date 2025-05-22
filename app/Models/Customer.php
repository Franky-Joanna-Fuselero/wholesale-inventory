<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'contact', // ✅ corrected from 'contact_number'
        'email',
        'address',
    ];

    public function receipts()
{
    return $this->hasMany(Receipt::class);
}

}


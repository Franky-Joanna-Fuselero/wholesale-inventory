<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemVariant extends Model
{
    public function item() {
    return $this->belongsTo(Item::class);
}

}

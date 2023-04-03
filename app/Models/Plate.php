<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    // Allocate the relation with restaurant in plate model
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}

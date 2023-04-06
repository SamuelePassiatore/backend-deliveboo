<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Allocate the relation with plates in model order
    public function plates()
    {
        return $this->belongsToMany(Plate::class);
    }

    // Allocate the relation with restaurant in plate model
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}

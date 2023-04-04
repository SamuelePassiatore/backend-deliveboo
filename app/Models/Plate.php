<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'is_visible', 'photo', 'is_vegan', 'is_vegetarian'];

    // Allocate the relation with restaurant in plate model
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // Allocate the relation with orders in model plate
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}

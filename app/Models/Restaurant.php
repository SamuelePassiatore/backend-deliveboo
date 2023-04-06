<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_name', 'address', 'vat', 'phone', 'mail', 'description', 'photo'];

    // Allocate the relation with user in restaurant model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Allocate the relation with plates in restaurant model
    public function plates()
    {
        return $this->hasMany(Plate::class, 'restaurant_id');
    }

    // Allocate the relation with types in model restaurant
    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    // Allocate the relation with plates in restaurant model
    public function orders()
    {
        return $this->hasMany(Order::class, 'restaurant_id');
    }
}

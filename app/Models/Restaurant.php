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
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    // Allocate the relation with restaurants in model type
    public function restaurants()
    {
        return $this->belongsToMany(Type::class);
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'quantity', 'is_visible', 'photo', 'is_vegan', 'is_vegetarian'];

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

    public function getDate($date_column)
    {
        $date = $this->$date_column;
        return Carbon::create($date)->format('d-m-Y H:i');
    }

    public function getDateDiff($date_column)
    {
        $date = $this->$date_column;
        return Carbon::parse($date)->diffForHumans();
    }
}

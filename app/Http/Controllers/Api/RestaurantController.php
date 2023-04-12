<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::with('types')->get();

        $restaurants->each(function ($restaurant) {
            if ($restaurant->photo)
                $restaurant->photo = url('storage/' . $restaurant->photo);
        });

        return response()->json($restaurants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { {

            $restaurant = Restaurant::with([
                'types',
                'plates' => function ($query) {
                    $query->where('is_visible', 1)->orderBy('name', 'asc');
                }
            ])->findOrFail($id);

            if ($restaurant->photo) $restaurant->photo = url('storage/' . $restaurant->photo);

            $restaurant->plates->each(function ($plate) {
                if ($plate->photo)
                    $plate->photo = url('storage/' . $plate->photo);
            });

            return response()->json($restaurant);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

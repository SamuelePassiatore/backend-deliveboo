<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $restaurants = Restaurant::where('user_id', 'LIKE', Auth::user()->id)->orderBy('updated_at')->get();
        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $restaurant = new Restaurant();
        return view('admin.restaurants.create', compact('restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'restaurant_name' => 'required|string',
            'address' => 'required|string',
            'vat' => 'required|string',
            'phone' => 'required|string',
            'mail' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required|image',
        ], [
            'restaurant_name.required' => "È necessario inserire un nome",
            'restaurant_name.string' => "Il nome inserito non è valido",
            'address.required' => "È necessario inserire un indirizzo",
            'address.string' => "L'indirizzo inserito non è valido",
            'vat.required' => "È necessario inserire una P.IVA",
            'vat.string' => "La P.IVA inserita non è valida",
            'phone.required' => "È necessario inserire un numero di telefono",
            'phone.string' => "Il numero di telefono inserito non è valido",
            'mail.required' => "È necessario inserire una mail",
            'mail.string' => "La email inserita non è valida",
            'description.required' => "È necessario inserire una descrizione",
            'description.string' => "La descrizione inserita non è valida",
            'photo.required' => "È necessario inserire un'immagine",
            'photo.image' => "L'immagine inserita non è valida",
        ]);

        $data = $request->all();

        $restaurant = new Restaurant();


        if (array_key_exists('photo', $data)) {
            $img_url = Storage::put('restaurants', $data['photo']);
            $data['photo'] = $img_url;
        }

        $restaurant->fill($data);

        $restaurant->user_id = Auth::id();

        $restaurant->save();

        return to_route('admin.restaurants.show', $restaurant->id)
            ->with('message', "Il ristorante $restaurant->restaurant_name è stato creato con successo")
            ->with('type', 'success');
    }


    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

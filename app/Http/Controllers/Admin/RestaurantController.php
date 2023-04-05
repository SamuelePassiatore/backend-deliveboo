<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
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
        $restaurants = Restaurant::where('user_id', 'LIKE', Auth::user()->id)->get();
        return view('admin.restaurants.index', compact('restaurants', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->restaurants->count() > 0) {
            return redirect()->route('admin.restaurants.index')
                ->with('message', "Non sei autorizzato a creare un nuovo ristorante")
                ->with('type', 'danger');
        }

        $restaurant = new Restaurant();
        $types = Type::orderBy('id')->get();
        return view('admin.restaurants.create', compact('restaurant', 'types'));
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
            'types' => 'exists:types,id'
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

        // Relate restaurants with types
        if (Arr::exists($data, 'types')) $restaurant->types()->attach($data['types']);

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
    public function edit(Restaurant $restaurant)
    {
        $types = Type::orderBy('id')->get();
        // Transform collection in array
        $restaurant_types = $restaurant->types->pluck('id')->toArray();
        return view('admin.restaurants.edit', compact('restaurant', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'restaurant_name' => 'required|string',
            'address' => 'required|string',
            'vat' => 'required|string',
            'phone' => 'required|string',
            'mail' => 'required|string',
            'description' => 'required|string',
            'photo' => 'image',
            'types' => 'exists:types,id'
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
            'photo.image' => "L'immagine inserita non è valida",
        ]);

        $data = $request->all();

        if (array_key_exists('photo', $data)) {
            $img_url = Storage::put('restaurants', $data['photo']);
            $data['photo'] = $img_url;
        }

        $restaurant->update($data);

        // Assign types
        if (Arr::exists($data, 'types')) $restaurant->types()->sync($data['types']);
        else $restaurant->types()->detach();

        return to_route('admin.restaurants.show', $restaurant->id)
            ->with('type', 'success')
            ->with('message', "Il ristorante $restaurant->restaurant_name è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return to_route('admin.restaurants.index')
            ->with('message', "Il ristorante $restaurant->restaurant_name è stato cancellato con successo")
            ->with('type', 'success');
    }
}

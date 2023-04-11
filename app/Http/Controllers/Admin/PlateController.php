<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $plates = Plate::where('restaurant_id', 'LIKE', Auth::user()->id)->orderBy('name', 'ASC')->get();
        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $plate = new Plate();
        return view('admin.plates.create', compact('plate'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0.50|max:999',
            'photo' => 'required|image',
        ], [
            'name.required' => "È necessario inserire un nome",
            'name.string' => "Il nome inserito non è valido",
            'description.required' => "È necessario inserire una descrizione",
            'description.string' => "La descrizione inserita non è valida",
            'price.required' => "È necessario inserire il prezzo",
            'price.numeric' => "Il valore inserito non è valido",
            'price.max' => "Il valore inserito supera il prezzo massimo consentito.",
            'price.min' => "Il valore inserito è inferiore al prezzo minimo previsto.",
            'photo.image' => "L'immagine inserita non è valida",
            'photo.required' => "L'immagine è obbligatoria",
        ]);

        $data = $request->all();

        $plate = new Plate();


        if (array_key_exists('photo', $data)) {
            $img_url = Storage::put('plates', $data['photo']);
            $data['photo'] = $img_url;
        }

        $plate->fill($data);

        $plate->is_visible = Arr::exists($data, 'is_visible');
        $plate->is_vegan = Arr::exists($data, 'is_vegan');
        $plate->is_vegetarian = Arr::exists($data, 'is_vegetarian');

        $plate->restaurant_id = Auth::id();

        $plate->save();

        return to_route('admin.plates.show', $plate->id)
            ->with('message', "Il piatto $plate->name è stato creato con successo")
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plate $plate)
    {
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plate $plate)
    {
        return view('admin.plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plate $plate)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0.50|max:999',
            'photo' => 'image'
        ], [
            'name.required' => "È necessario inserire un nome",
            'name.string' => "Il nome inserito non è valido",
            'description.required' => "È necessario inserire una descrizione",
            'description.string' => "La descrizione inserita non è valida",
            'price.required' => "È necessario inserire il prezzo",
            'price.numeric' => "Il valore inserito non è valido",
            'price.max' => "Il valore inserito supera il prezzo massimo consentito.",
            'price.min' => "Il valore inserito è inferiore al prezzo minimo previsto.",
            'photo.image' => "L'immagine inserita non è valida",
        ]);

        $data = $request->all();

        if (array_key_exists('photo', $data)) {
            $img_url = Storage::put('plates', $data['photo']);
            $data['photo'] = $img_url;
        }

        $data['is_visible'] = Arr::exists($data, 'is_visible');
        $data['is_vegan'] = Arr::exists($data, 'is_vegan');
        $data['is_vegetarian'] = Arr::exists($data, 'is_vegetarian');

        $plate->update($data);

        return to_route('admin.plates.show', $plate->id)
            ->with('type', 'success')
            ->with('message', "Il piatto $plate->name è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();

        return to_route('admin.plates.index')
            ->with('message', "Il piatto $plate->name è stato cancellato con successo")
            ->with('type', 'success');
    }
}

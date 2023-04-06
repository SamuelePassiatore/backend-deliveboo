@extends('layouts.app')

@section('title', 'Piatti')

@section('content')
    <div class="container">
        <header class="my-4 d-flex align-items-center justify-content-between">
            <h1>I tuoi piatti</h1>
            <div>
                {{-- @if (count($restaurants) == 0)
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-success me-2">
                        <i class="fas fa-plus me-2"></i>Crea ristorante
                    </a>
                @endif
                <a href="{{ route('admin.home') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Indietro
                </a> --}}
            </div>
        </header>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Disponibile</th>
                    <th scope="col">Vegano</th>
                    <th scope="col">Vegetariano</th>
                    <th scope="col">Ultima modifica</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($plates as $plate)
                    <tr>
                        <th scope="row">{{ $plate->id }}</th>
                        <td>{{ $plate->name }}</td>
                        <td>{{ $plate->price }} € </td>
                        <td>{{ $plate->is_visible }}</td>
                        <td>{{ $plate->is_vegan }}</td>
                        <td>{{ $plate->is_vegetarian }}</td>
                        <td>{{ $plate->updated_at }}</td>
                        {{-- <td>
                            <div class="d-flex">
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('admin.restaurants.show', $restaurant->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mx-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a class="btn btn-sm btn-warning"
                                    href="{{ route('admin.restaurants.edit', $restaurant->id) }}">
                                    <i class="fas fa-pencil"></i>
                                </a>
                            </div>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td scope="row" colspan="8" class="text-center">Non ci sono piatti disponibili</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

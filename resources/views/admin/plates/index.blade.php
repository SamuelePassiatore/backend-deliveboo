@extends('layouts.app')

@section('title', 'Piatti')

@section('content')
    <div class="container">
        <header class="my-4 d-flex align-items-center justify-content-between">
            <h1>I tuoi piatti</h1>
            <div>
                <a href="{{ route('admin.plates.create') }}" class="btn btn-success me-2">
                    <i class="fas fa-plus me-2"></i>Crea piatto
                </a>
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Indietro
                </a>
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
                        <td>
                            <i
                                class="fas fa-circle-{{ $plate->is_visible ? 'check' : 'xmark' }} 
                                {{ $plate->is_visible ? 'text-success' : 'text-danger' }}">
                            </i>
                        </td>
                        <td><i
                                class="fas fa-circle-{{ $plate->is_vegan ? 'check' : 'xmark' }} 
                            {{ $plate->is_vegan ? 'text-success' : 'text-danger' }}">
                            </i>
                        </td>
                        <td>
                            <i
                                class="fas fa-circle-{{ $plate->is_vegetarian ? 'check' : 'xmark' }} 
                            {{ $plate->is_vegetarian ? 'text-success' : 'text-danger' }}">
                            </i>
                        </td>
                        <td>{{ $plate->updated_at }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.plates.show', $plate->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger mx-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a class="btn btn-sm btn-warning" href="{{ route('admin.plates.edit', $plate->id) }}">
                                    <i class="fas fa-pencil"></i>
                                </a>
                            </div>
                        </td>
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

@extends('layouts.app')

@section('title', 'Ristoranti')

@section('content')
    <div class="container">
        <header class="my-4 d-flex align-items-center justify-content-between">
            <h1>I tuoi ristoranti</h1>
            <div class="d-flex align-items-center">
                <form method="GET" action="{{ route('admin.restaurants.index') }}" class="me-5 d-flex" id="filter-form">
            </div>
            {{-- <div>
                <a href="{{ route('admin.restaurants.create') }}" class="btn btn-success me-2">
                    <i class="fas fa-plus"></i>Add restaurant
                </a>
            </div> --}}
        </header>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">P.IVA</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($restaurants as $restaurant)
                    <tr>
                        <th scope="row">{{ $restaurant->id }}</th>
                        <td>{{ $restaurant->restaurant_name }}</td>
                        <td>{{ $restaurant->address }}</td>
                        <td>{{ $restaurant->vat }}</td>
                        <td>{{ $restaurant->phone }}</td>
                        <td>{{ $restaurant->mail }}</td>
                        <td>
                            {{-- <div class="d-flex">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.restaurants.show', $restaurant->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
    
                                    <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST"
                                        class="delete-form">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger mx-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-sm btn-warning" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                            </div> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td scope="row" colspan="7" class="text-center">Non ci sono ristoranti</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

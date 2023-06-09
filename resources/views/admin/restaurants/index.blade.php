@extends('layouts.app')

@section('title', 'Ristoranti')

@section('content')
    <div class="index-main d-flex flex-column justify-content-between">
        <div class="container">
            <header class="d-flex align-items-center justify-content-between pt-5 pb-2">
                <h1 class="text-dark-green">Il mio ristorante</h1>
            </header>

            <table class="table">
                <thead>
                    <tr class="text-dark-green">
                        <th scope="col">Nome</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">P.IVA</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ultima modifica</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($restaurants as $restaurant)
                        <tr>
                            <td>{{ $restaurant->restaurant_name }}</td>
                            <td>{{ $restaurant->address }}</td>
                            <td>{{ $restaurant->vat }}</td>
                            <td>{{ $restaurant->phone }}</td>
                            <td>{{ $restaurant->mail }}</td>
                            <td>
                                @forelse ($restaurant->types as $type)
                                    <span>
                                        {{ $type->name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    </span>
                                @empty
                                    <div class="text-center">-</div>
                                @endforelse
                            </td>
                            <td>{{ $restaurant->getDateDiff('updated_at') }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-sm btn-white border-dark"
                                        href="{{ route('admin.restaurants.show', $restaurant->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST"
                                        class="delete-form" data-name="ristorante">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white border-dark mx-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-sm btn-white border-dark"
                                        href="{{ route('admin.restaurants.edit', $restaurant->id) }}">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="8" class="text-center">Nessun ristorante</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                @if (count($restaurants) == 0)
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-white border-dark text-dark me-2">
                        <i class="fas fa-plus me-2"></i>Crea ristorante
                    </a>
                @endif
            </div>
            @if (!count($restaurants) == 0)
                <div class="d-flex justify-content-center my-5">
                    <a href="{{ route('admin.plates.index') }}" class="btn btn-warning text-white fw-bold me-3">
                        <i class="fa-solid fa-burger pe-2"></i>I miei piatti
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-success fw-bold">
                        <i class="fa-solid fa-sheet-plastic pe-2"></i>I miei ordini
                    </a>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-start mb-2 ms-4">
            <a href="{{ route('admin.home') }}" class="btn btn-white border-dark">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>
@endsection

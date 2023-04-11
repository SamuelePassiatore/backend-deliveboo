@extends('layouts.app')

@section('title', 'Piatti')

@section('content')
    <div class="index-main d-flex flex-column justify-content-between">
        <div class="container">
            <header class="pt-4 pb-2 d-flex align-items-center justify-content-between">
                <h1 class="text-dark-green">I tuoi piatti</h1>
            </header>

            <table class="table">
                <thead>
                    <tr class="text-dark-green">
                        <th scope="col">Nome</th>
                        <th scope="col" style="width: 80px" class="text-end">Prezzo</th>
                        <th scope="col" class="text-center">Disponibile</th>
                        <th scope="col" class="text-center">Vegano</th>
                        <th scope="col" class="text-center">Vegetariano</th>
                        <th scope="col" class="text-center">Ultima modifica</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plates as $plate)
                        <tr>
                            <td>{{ $plate->name }}</td>
                            <td class="text-end">{{ $plate->price }} € </td>
                            <td class="text-center">
                                <i
                                    class="fas fa-circle-{{ $plate->is_visible ? 'check' : 'xmark' }} 
                                    {{ $plate->is_visible ? 'text-success' : 'text-danger' }}">
                                </i>
                            </td>
                            <td class="text-center"><i
                                    class="fas fa-circle-{{ $plate->is_vegan ? 'check' : 'xmark' }} 
                                {{ $plate->is_vegan ? 'text-success' : 'text-danger' }}">
                                </i>
                            </td>
                            <td class="text-center">
                                <i
                                    class="fas fa-circle-{{ $plate->is_vegetarian ? 'check' : 'xmark' }} 
                                {{ $plate->is_vegetarian ? 'text-success' : 'text-danger' }}">
                                </i>
                            </td>
                            <td class="text-center">{{ $plate->getDateDiff('updated_at') }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-sm btn-white border-dark"
                                        href="{{ route('admin.plates.show', $plate->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST"
                                        class="delete-form" data-name="piatto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white border-dark mx-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-sm btn-white border-dark"
                                        href="{{ route('admin.plates.edit', $plate->id) }}">
                                        <i class="fas fa-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td scope="row" colspan="8" class="text-center">Nessun piatto disponibile</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center pt-3">
                <a href="{{ route('admin.plates.create') }}" class="btn btn-white border-dark me-2">
                    <i class="fas fa-plus me-2"></i>Crea piatto
                </a>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-white border-dark mb-2 me-4">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>


@endsection

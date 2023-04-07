@extends('layouts.app')

@section('title', $plate->name)

@section('content')

    <div class="container">
        <header class="pt-5 text-center">
            <h1>{{ $plate->name }}</h1>
        </header>

        <section id="single-restaurant">
            <div class="container">
                <div class="row row-cols-2">
                    {{-- Plate IMG  --}}
                    <div class="col d-flex justify-content-center pt-5">
                        @if ($plate->photo)
                            <img src="{{ asset('storage/' . $plate->photo) }}" alt="{{ $plate->name }}"
                                class="rounded overflow-hidden ">
                        @endif
                    </div>
                    {{-- PLATE CONTENT --}}
                    <div class="col d-flex justify-content-center flex-column pt-5">
                        <div><strong>Descrizione: </strong>
                            <p class="my-2"> {{ $plate->description }}</p>
                        </div>
                        <div class="my-2"><strong>Prezzo: </strong> {{ $plate->price }} € </div>
                        <div class="my-2"><strong>Disponibile: </strong>
                            <i
                                class="fas fa-circle-{{ $plate->is_visible ? 'check' : 'xmark' }} {{ $plate->is_visible ? 'text-success' : 'text-danger' }}"></i>
                        </div>
                        <div class="my-2"><strong>Vegano: </strong>
                            <i
                                class="fas fa-circle-{{ $plate->is_vegan ? 'check' : 'xmark' }} 
                                {{ $plate->is_vegan ? 'text-success' : 'text-danger' }}">
                            </i>
                        </div>
                        <div class="my-2"><strong>Vegetariano: </strong>
                            <i
                                class="fas fa-circle-{{ $plate->is_vegetarian ? 'check' : 'xmark' }} 
                                {{ $plate->is_vegetarian ? 'text-success' : 'text-danger' }}">
                            </i>
                        </div>
                        <div class="my-2"><strong>Creato il:
                            </strong><time>{{ $plate->getDate('created_at') }}</time>
                        </div>
                        <div class="my-2"><strong>Modificato il:
                            </strong><time>{{ $plate->getDate('updated_at') }}</time>
                        </div>
                    </div>
                </div>

                {{-- BUTTONS --}}
                <div class="d-flex justify-content-between my-5">
                    <a href="{{ route('admin.plates.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Indietro
                    </a>
                    {{-- <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST"
                        class="delete-form">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger mx-2"><i class="fas fa-trash me-2"></i>Elimina</button>
                    </form>
                    <a class="btn btn-warning" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">
                        <i class="fas fa-pencil me-2"></i>Modifica
                    </a> --}}
                </div>
            </div>
        </section>
    @endsection
</div>

@section('scripts')

@endsection

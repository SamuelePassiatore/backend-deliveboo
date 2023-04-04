@extends('layouts.app')

@section('title', $restaurant->restaurant_name)

@section('content')

    <div class="container">
        <header class="pt-5 text-center">
            <h1>{{ $restaurant->restaurant_name }}</h1>
        </header>

        <section id="single-restaurant">
            <div class="container">
                <div class="row row-cols-2">
                    {{-- RESTAURANT IMG  --}}
                    <div class="col d-flex justify-content-center pt-5">
                        @if ($restaurant->photo)
                            <img src="{{ asset('storage/' . $restaurant->photo) }}" alt="{{ $restaurant->restaurant_name }}"
                                class="rounded overflow-hidden ">
                        @endif
                    </div>
                    {{-- RESTAURANT CONTENT --}}
                    <div class="col d-flex justify-content-center flex-column pt-5">
                        <div><strong>Description: </strong>
                            <p class="my-2"> {{ $restaurant->description }}</p>
                        </div>
                        <div class="my-2"><strong>Proprietario:
                            </strong>{{ Auth::user()->name }}
                        </div>
                        <div class="my-2"><strong>Nome ristorante: </strong> {{ $restaurant->restaurant_name }} </div>
                        <div class="my-2"><strong>Indirizzo: </strong> {{ $restaurant->address }} </div>
                        <div class="my-2"><strong>P.IVA: </strong>
                            {{ $restaurant->vat }}
                        </div>
                        <div class="my-2"><strong>Telefono: </strong> {{ $restaurant->phone }}
                        </div>
                        <div class="my-2"><strong>Email: </strong> {{ $restaurant->mail }}
                        </div>
                        <div class="my-2"><strong>Creato il:
                            </strong><time>{{ $restaurant->created_at }}</time>
                        </div>
                        <div class="my-2"><strong>Modificato il:
                            </strong><time>{{ $restaurant->updated_at }}</time>
                        </div>
                    </div>
                </div>

                {{-- BUTTONS --}}
                <div class="d-flex justify-content-between my-5">
                    <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-arrow-left me-2"></i>Indietro
                    </a>
                    {{-- <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST" class="delete-form">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger mx-2"><i class="fas fa-trash me-2"></i>Elimina</button>
                    </form> --}}
                    {{-- <a class="btn btn-warning" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">
                        <i class="fas fa-pencil me-2"></i>Modifica
                    </a> --}}
                </div>
            </div>
        </section>
    @endsection
</div>

@section('scripts')

@endsection

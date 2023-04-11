@extends('layouts.app')

@section('title', $restaurant->restaurant_name)

@section('content')
    <div class="index-main d-flex flex-column justify-content-end align-items-end">
        <div class="container">
            <header class="text-center text-dark-green">
                <h1>{{ $restaurant->restaurant_name }}</h1>
            </header>

            <section id="single-restaurant">
                <div class="container">
                    <div class="row">
                        {{-- RESTAURANT IMG  --}}
                        <div class="col-6 d-flex justify-content-center pt-2">
                            {{-- @if ($restaurant->photo)
                                <img src="{{ asset('storage/' . $restaurant->photo) }}" alt="{{ $restaurant->restaurant_name }}"
                                    class="rounded overflow-hidden ">
                            @else --}}
                            <img class="img-fluid"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png"
                                alt="default-img">
                            {{-- @endif --}}
                        </div>
                        {{-- RESTAURANT CONTENT --}}
                        <div class="col-5 d-flex justify-content-center flex-column pt-2">
                            <div><strong class="text-dark-green">Description: </strong>
                                <p class="my-2"> {{ $restaurant->description }}</p>
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Proprietario:
                                </strong>{{ Auth::user()->name }}
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Nome ristorante: </strong>
                                {{ $restaurant->restaurant_name }} </div>
                            <div class="my-2"><strong class="text-dark-green">Indirizzo: </strong>
                                {{ $restaurant->address }}
                            </div>
                            <div class="my-2"><strong class="text-dark-green">P.IVA: </strong>
                                {{ $restaurant->vat }}
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Telefono: </strong> {{ $restaurant->phone }}
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Email: </strong> {{ $restaurant->mail }}
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Tipo: </strong>
                                @forelse ($restaurant->types as $type)
                                    {{ $type->name }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @empty
                                    Nessun tipo
                                @endforelse
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Creato il:
                                </strong><time>{{ $restaurant->getDate('created_at') }}</time>
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Modificato il:
                                </strong><time>{{ $restaurant->getDate('updated_at') }}</time>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- BUTTONS --}}
            <div class="d-flex justify-content-center align-items-center pt-3">
                <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST" class="delete-form"
                    data-name="ristorante">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-white border-dark me-3"><i
                            class="fas fa-trash me-2"></i>Elimina</button>
                </form>
                <a class="btn btn-white border-dark" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">
                    <i class="fas fa-pencil me-2"></i>Modifica
                </a>
            </div>
        </div>
        <div class="me-4 pb-2 d-flex justify-content-end">
            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-white border-dark">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>

@endsection

@section('scripts')

@endsection

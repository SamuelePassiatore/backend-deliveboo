@extends('layouts.app')

@section('title', $plate->name)

@section('content')
    <div class="index-main">
        <div class="container">
            <header class="text-center pt-3">
                <h1 class="text-dark-green">{{ $plate->name }}</h1>
            </header>

            <section id="single-restaurant">
                <div class="container">
                    <div class="row row-cols-2 pt-2">
                        {{-- Plate IMG  --}}
                        <div class="col d-flex justify-content-center">
                            {{-- @if ($plate->photo)
                                <img src="{{ asset('storage/' . $plate->photo) }}" alt="{{ $plate->name }}"
                                    class="rounded overflow-hidden ">
                            @endif --}}
                            <img class="img-fluid"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png"
                                alt="default-img">
                        </div>
                        {{-- PLATE CONTENT --}}
                        <div class="col d-flex justify-content-center flex-column">
                            <div><strong class="text-dark-green">Descrizione: </strong>
                                <p class="my-2"> {{ $plate->description }}</p>
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Prezzo: </strong> {{ $plate->price }} €
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Disponibile: </strong>
                                <i
                                    class="fas fa-circle-{{ $plate->is_visible ? 'check' : 'xmark' }} {{ $plate->is_visible ? 'text-success' : 'text-danger' }}"></i>
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Vegano: </strong>
                                <i
                                    class="fas fa-circle-{{ $plate->is_vegan ? 'check' : 'xmark' }} 
                                    {{ $plate->is_vegan ? 'text-success' : 'text-danger' }}">
                                </i>
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Vegetariano: </strong>
                                <i
                                    class="fas fa-circle-{{ $plate->is_vegetarian ? 'check' : 'xmark' }} 
                                    {{ $plate->is_vegetarian ? 'text-success' : 'text-danger' }}">
                                </i>
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Creato il:
                                </strong><time>{{ $plate->getDate('created_at') }}</time>
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Modificato il:
                                </strong><time>{{ $plate->getDate('updated_at') }}</time>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center pt-3">
                        <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST" class="delete-form">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-white border-dark me-3"><i
                                    class="fas fa-trash me-2"></i>Elimina</button>
                        </form>
                        <a class="btn btn-white border-dark" href="{{ route('admin.plates.edit', $plate->id) }}">
                            <i class="fas fa-pencil me-2"></i>Modifica
                        </a>
                    </div>
                </div>
            </section>
        </div>
        <div class="d-flex justify-content-end me-4">
            <a href="{{ route('admin.plates.index') }}" class="btn btn-white border-dark">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>

@endsection

@section('scripts')

@endsection

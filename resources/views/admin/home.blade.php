@extends('layouts.app')
@section('content')
    <div class="p-5 d-flex flex-column justify-content-center">
        <h1 class="text-center">Ciao {{ Auth::user()->name }}</h1>
        <div class="container d-flex justify-content-center pt-4">
            @if (Auth::user()->restaurants->count() > 0)
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary me-2">
                    Vedi il tuo ristorante
                </a>
            @else
                <a href="{{ route('admin.restaurants.create') }}" class="btn btn-success">
                    Crea il tuo ristorante
                </a>
            @endif

        </div>
    </div>
@endsection

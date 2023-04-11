@extends('layouts.app')
@section('content')
    <div class="index-main">
        <div class="jumbotron d-flex justify-content-center">
            <img src="{{ Vite::asset('resources/img/jumbo5.png') }}" class="w-100" alt="jumbotron">
        </div>
        <div class="p-5 d-flex flex-column justify-content-center ">
            <h1 class="text-center text-dark-green m-0">Ciao, {{ Auth::user()->name }}</h1>
            <div class="container d-flex justify-content-center pt-4 ">
                @if (Auth::user()->restaurants->count() > 0)
                    <a href="{{ route('admin.restaurants.index') }}" class="btn btn-warning text-white fw-bold">
                        Vedi il tuo ristorante
                    </a>
                @else
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-warning text-white fw-bold">
                        Crea il tuo ristorante
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection

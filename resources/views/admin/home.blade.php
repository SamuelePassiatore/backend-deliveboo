@extends('layouts.app')
@section('content')
    <div class="index-main">
        <div class="background">
            <div class="container">
                <div class="row flex-column">
                    <div class="col-6 mx-auto">
                        <!-- Scritta -->
                        <img src="{{ Vite::asset('resources/img/logo_word.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-6 mx-auto">
                        <!-- Piatto -->
                        <img class="jumbotron-img img-fluid" src="{{ Vite::asset('resources/img/jumbotron.png') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-5 d-flex flex-column justify-content-center">
            <h1 class="text-center text-dark-green text-bold m-0">Ciao, {{ Auth::user()->name }}</h1>
            <div class="container d-flex justify-content-center pt-4">
                @if (Auth::user()->restaurants->count() > 0)
                    <a href="{{ route('admin.restaurants.index') }}" class="btn btn-see text-white fw-bold">
                        Vedi il tuo ristorante
                    </a>
                @else
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-save text-white fw-bold">
                        Crea il tuo ristorante
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection

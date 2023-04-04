@extends('layouts.app')

@section('title', 'Modifica ristorante')

@section('content')
    <div class="container">
        <header class="my-4 d-flex justify-content-between align-items-center">
            <h1>Modifica ristorante</h1>
        </header>
        <hr>
        @include('includes.restaurants.form')
    </div>

@endsection

@section('scripts')

@endsection

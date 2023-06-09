@extends('layouts.app')

@section('title', 'Nuovo ristorante')

@section('content')
    <div class="index-main">
        <div class="container">
            <header class="pt-4 d-flex justify-content-between align-items-center">
                <h1 class="text-dark-green">Crea un nuovo ristorante</h1>
            </header>
            <hr>
            @include('includes.restaurants.form')
        </div>
        <div class="d-flex mb-2 ms-4">
            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-white border-dark">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>


@endsection

@section('scripts')

@endsection

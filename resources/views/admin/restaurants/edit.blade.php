@extends('layouts.app')

@section('title', 'Modifica ristorante')

@section('content')
    <div class="container">
        <header class="my-4 d-flex justify-content-between align-items-center">
            <h1 class="text-dark-green">Modifica ristorante</h1>
        </header>
        <hr>
        @include('includes.restaurants.form')
    </div>
    <div class="d-flex justify-content-end mb-4 me-4">
        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-white border-dark">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

@endsection

@section('scripts')

@endsection

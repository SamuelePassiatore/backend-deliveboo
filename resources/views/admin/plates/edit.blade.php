@extends('layouts.app')

@section('title', 'Modifica piatto')

@section('content')
    <div class="index-main">
        <div class="container">
            <header class="d-flex justify-content-between align-items-center">
                <h1 class="text-dark-green">Modifica piatto</h1>
            </header>
            <hr>
            @include('includes.plates.form')
        </div>

    </div>
@endsection

@section('scripts')

@endsection

@extends('layouts.app')

@section('title', 'Modifica piatto')

@section('content')
    <div class="container">
        <header class="my-4 d-flex justify-content-between align-items-center">
            <h1>Modifica piatto</h1>
        </header>
        <hr>
        @include('includes.plates.form')
    </div>

@endsection

@section('scripts')

@endsection

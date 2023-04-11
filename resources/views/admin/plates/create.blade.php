@extends('layouts.app')

@section('title', 'Nuovo piatto')

@section('content')
    <div class="index-main">
        <div class="container">
            <header class="d-flex justify-content-between align-items-center">
                <h1 class="text-dark-green">Crea piatto</h1>
            </header>
            <hr>
            @include('includes.plates.form')
        </div>
    </div>
@endsection

@section('scripts')

@endsection

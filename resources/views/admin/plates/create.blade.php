@extends('layouts.app')

@section('title', 'Nuovo piatto')

@section('content')
    <div class="container">
        <header class="my-4 d-flex justify-content-between align-items-center">
            <h1>Nuovo piatto</h1>
        </header>
        <hr>
        @include('includes.plates.form')
    </div>


@endsection

@section('scripts')

@endsection

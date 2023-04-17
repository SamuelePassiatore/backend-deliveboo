@extends('layouts.app')

@section('content')
    <div class="index-main">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h1>404 | Not Found</h1>
            <img class="img-fluid vert-move mb-3" src="{{ Vite::asset('resources/img/triste-404.png') }}" alt="">
            <!-- <router-link to="/" class="btn btn-sm btn-secondary">indietro</router-link> -->
        </div>
    </div>
@endsection

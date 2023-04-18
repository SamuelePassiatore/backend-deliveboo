@extends('layouts.app')

@section('content')
    <div class="index-main">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <h1>404 | Not Found</h1>
            <img class="img-fluid vert-move mb-3" src="{{ Vite::asset('resources/img/triste-404.png') }}" alt="">
            <div class="d-flex justify-content-end mb-2 me-4">
                <a href="{{ route('admin.home') }}" class="btn btn-lg btn-secondary mb-5">
                    Indietro
                </a>
            </div>
        </div>
    </div>
@endsection

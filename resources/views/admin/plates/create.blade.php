@extends('layouts.app')

@section('title', 'Nuovo piatto')

@section('content')
    <div class="index-main d-flex flex-column justify-content-between">
        <div class="container">
            <header class="d-flex justify-content-between align-items-center pt-3">
                <h1 class="text-dark-green">Crea piatto</h1>
            </header>
            <hr>
            @include('includes.plates.form')
        </div>
        <div class="d-flex justify-content-end align-items-end mb-2 me-4">
            <a href="{{ route('admin.plates.index') }}" class="btn btn-white border-dark">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

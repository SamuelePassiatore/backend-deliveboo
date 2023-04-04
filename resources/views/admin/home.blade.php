@extends('layouts.app')
@section('content')
    <h1 class="text-center py-3">Admin Home Page</h1>
    <h2 class="p-5 text-center">Benvenuto {{ Auth::user()->name }}</h2>
@endsection

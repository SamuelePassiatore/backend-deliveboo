@extends('layouts.app')

@section('title', 'Ordini')

@section('content')
    <div class="container">
        <header class="my-4 d-flex align-items-center justify-content-between">
            <h1>I tuoi ordini</h1>
            <div>
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Indietro
                </a>
            </div>
        </header>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codice Ordine</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Piatto</th>
                    <th scope="col">Totale</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->order_code }}</td>
                        <td>{{ $order->first_name }}</td>
                        <td>{{ $order->last_name }}</td>
                        <td>
                            @forelse ($order->plates as $plate)
                                <span>
                                    {{ $plate->name }}
                                </span>
                            @empty
                                <div class="text-center">-</div>
                            @endforelse
                        </td>
                        <td>{{ $order->total_amount }} €</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            {{-- <div class="d-flex">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.order.show', $plate->id) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td scope="row" colspan="7" class="text-center">Non ci sono ordini al momento</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection

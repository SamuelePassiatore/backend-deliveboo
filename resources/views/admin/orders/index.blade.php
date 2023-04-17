@extends('layouts.app')

@section('title', 'Ordini')

@section('content')
    <div class="index-main d-flex flex-column justify-content-between">
        <div class="container">
            <header class="pt-4 pb-3 d-flex align-items-center justify-content-between">

                <h1 class="text-dark-green">I tuoi ordini</h1>

            </header>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark-green">Codice Ordine</th>
                        <th scope="col" class="text-dark-green">Nome</th>
                        <th scope="col" class="text-dark-green">Cognome</th>
                        <th scope="col" class="text-dark-green">Piatti</th>
                        <th scope="col" class="text-dark-green">Totale</th>
                        <th scope="col" class="text-dark-green">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ $order->first_name }}</td>
                            <td>{{ $order->last_name }}</td>
                            <td>
                                @forelse ($order->plates as $plate)
                                    <span>
                                        {{ $plate->name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    </span>
                                @empty
                                    <div class="text-center">-</div>
                                @endforelse
                            </td>
                            <td>{{ $order->total_amount }} €</td>
                            <td>{{ $order->status ? 'Riuscito' : 'Respinto' }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-sm btn-white border-dark"
                                        href="{{ route('admin.orders.show', $plate->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
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
        <div class="d-flex justify-content-end mb-2 me-4">
            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-white border-dark">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>

@endsection

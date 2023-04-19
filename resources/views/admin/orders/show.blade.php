@extends('layouts.app')

@section('title', $order->order_code)

@section('content')
    <div class="index-main d-flex flex-column justify-content-between">
        <div class="container">
            <header class="pt-5 text-center">
                <h1 class="text-dark-green">{{ $order->first_name }} {{ $order->last_name }} - Numero ordine:
                    {{ $order->order_code }}</h1>
            </header>

            <section id="single-restaurant">
                <div class="container">
                    <div class="row row-cols-2">
                        {{-- ORDER CONTENT --}}
                        <div class="col d-flex justify-content-center flex-column pt-5">
                            <div class="my-2"><strong class="text-dark-green">Nome: </strong> {{ $order->first_name }}</div>
                            <div class="my-2"><strong class="text-dark-green">Cognome: </strong> {{ $order->last_name }}
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Email: </strong> {{ $order->mail }}</div>
                            <div class="my-2"><strong class="text-dark-green">Telefono: </strong> {{ $order->phone }}
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Indirizzo: </strong> {{ $order->address }}
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Piatti: </strong>
                                @forelse ($order->plates as $plate)
                                    <span>
                                        {{ $plate->name }} [{{ $plate->quantity }}]
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    </span>
                                @empty
                                    <div class="text-center">-</div>
                                @endforelse
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Totale: </strong>
                                {{ $order->total_amount }}
                                €
                            </div>
                            <div class="my-2"><strong class="text-dark-green">Codice Ordine: </strong>
                                {{ $order->order_code }}</div>
                            <div class="my-2"><strong class="text-dark-green">Status: </strong>
                                {{ $order->status ? 'Riuscito' : 'Respinto' }}</div>
                            <div class="d-flex">
                                <strong class="text-dark-green pe-2">Note: </strong>
                                @if ($order->note)
                                    <div class="my-2">
                                        <p> {{ $order->note }}</p>
                                    </div>
                                @else
                                    <span>-</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="d-flex mb-2 ms-4">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-white border-dark">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>

@endsection

@section('scripts')

@endsection

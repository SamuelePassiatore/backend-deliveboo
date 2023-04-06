@extends('layouts.app')

@section('title', $order->order_code)

@section('content')

    <div class="container">
        <header class="pt-5 text-center">
            <h1>{{ $order->first_name }} {{ $order->last_name }} - {{ $order->order_code }}</h1>
        </header>

        <section id="single-restaurant">
            <div class="container">
                <div class="row row-cols-2">
                    {{-- ORDER CONTENT --}}
                    <div class="col d-flex justify-content-center flex-column pt-5">
                        <div class="my-2"><strong>Nome: </strong> {{ $order->first_name }}</div>
                        <div class="my-2"><strong>Cognome: </strong> {{ $order->last_name }}</div>
                        <div class="my-2"><strong>Email: </strong> {{ $order->mail }}</div>
                        <div class="my-2"><strong>Telefono: </strong> {{ $order->phone }}</div>
                        <div class="my-2"><strong>Indirizzo: </strong> {{ $order->address }}</div>
                        <div class="my-2"><strong>Piatti: </strong>
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
                        </div>
                        <div class="my-2"><strong>Totale: </strong> {{ $order->total_amount }} €</div>
                        <div class="my-2"><strong>Codice Ordine: </strong> {{ $order->order_code }}</div>
                        <div class="my-2"><strong>Status: </strong> {{ $order->status ? 'Riuscito' : 'Respinto' }}</div>
                        @if ($order->note)
                            <div><strong>Note: </strong>
                                <p class="my-2"> {{ $order->note }}</p>
                            </div>
                        @else
                            <span>-</span>
                        @endif

                    </div>
                </div>

                {{-- BUTTONS --}}
                <div class="d-flex justify-content-between my-5">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Indietro
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')

@endsection

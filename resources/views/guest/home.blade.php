@extends('layouts.app')
@section('content')
    <div class="index-main">
        <div class="jumbotron bg-light rounded-3 h-100">
            <div class="container py-5 d-flex flex-column justify-content-center align-items-center h-100">
                <div class="logo_laravel d-flex align-items-center">
                    <img src="{{ asset('images/logo_base.png') }}" alt="Logo Deliveboo" width="80"
                        class="img-fluid d-inline-block me-2">
                    <h1 class="display-5 fw-bold ms-2 text-dark-green">
                        Benvenuti su Deliveboo
                    </h1>
                </div>

                <p class="col-md-10 fs-4 py-3">Deliveboo è la tua nuova destinazione online per scoprire i migliori
                    ristoranti
                    della
                    tua zona e ordinare il cibo direttamente a casa tua. Con una vasta selezione di ristoranti di alta
                    qualità,
                    Deliveboo ti offre un'esperienza di ordinazione facile, veloce e conveniente. Dai un'occhiata ai menu
                    dei
                    ristoranti e ordina il tuo pasto preferito con pochi clic. Non importa se stai cercando una cena
                    romantica o
                    un pranzo veloce in ufficio, Deliveboo ha tutto ciò di cui hai bisogno
                    per soddisfare il tuo appetito.</p>
                <a href="http://localhost:5174/" class="btn btn-white text-white btn-home" type="button">Provalo subito</a>
            </div>
        </div>
    </div>
@endsection

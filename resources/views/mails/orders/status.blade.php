<x-mail::message>
    <h1>E' stato effettuato un nuovo ordine</h1>
    <h2>Ordinante: {{ $order->first_name }} {{ $order->last_name }}</h2>
    <h3>Numero ordine: {{ $order->order_code }}</h3>
    <div>Email: {{ $order->mail }}</div>
    <div>Telefono: {{ $order->phone }} </div>
    <div>Indirizzo: {{ $order->address }} </div>
    <div class="d-flex">
        <div> Note:
            @if ($order->note)
                <div class="my-2">
                    <p> {{ $order->note }}</p>
                </div>
            @else
                <span>-</span>
            @endif
        </div>
    </div>
    <div>Totale ordine: {{ $order->total_amount }}€</div>

</x-mail::message>

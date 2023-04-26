{{-- Form --}}
@if ($restaurant->exists)
    <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data"
        novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data" novalidate>
@endif


@csrf
<div class="row">
    <div class="col-4">
        <div class="mb-3">
            <label for="restaurant_name" class="form-label text-dark-green fw-bold">Nome:</label>
            <input type="text" class="form-control @error('restaurant_name') is-invalid @enderror"
                id="restaurant_name" placeholder="Inserisci un nome" name="restaurant_name" required
                value="{{ old('restaurant_name', $restaurant->restaurant_name) }}">
            @error('restaurant_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="mb-3">
            <label for="address" class="form-label text-dark-green fw-bold">Indirizzo:</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                placeholder="Inserisci un indirizzo" name="address" required
                value="{{ old('address', $restaurant->address) }}">
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="mb-3">
            <label for="vat" class="form-label text-dark-green fw-bold">P.IVA:</label>
            <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat"
                placeholder="Inserisci una P.IVA" name="vat" minlength="11" maxlength="11" required
                value="{{ old('vat', $restaurant->vat) }}">
            @error('vat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="phone" class="form-label text-dark-green fw-bold">Telefono:</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                placeholder="Inserisci un numero di telefono" name="phone" maxlength="15" required
                value="{{ old('phone', $restaurant->phone) }}">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="mail" class="form-label text-dark-green fw-bold">Email:</label>
            <input type="email" class="form-control @error('mail') is-invalid @enderror" id="mail"
                placeholder="Inserisci una mail" name="mail" required value="{{ old('mail', $restaurant->mail) }}">
            @error('mail')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-4">
        <div class="mb-3">
            <label for="photo" class="form-label text-dark-green fw-bold">Foto:</label>
            <input type="file" class="form-control @if ($restaurant->photo) d-none @endif"
                @error('photo') is-invalid @enderror id="photo" name="photo">
            {{-- Finto upload --}}
            <div class="input-group mb-3 @if (!$restaurant->photo) d-none @endif" id="previous-image">
                <button class="btn btn-outline-secondary" type="button" id="change-image-button">Cambia
                    immagine</button>
                <input type="text" class="form-control" value="{{ $restaurant->photo }}" disabled>
            </div>
            @error('photo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <img class="img-fluid" id="img-preview" style="height: 120px; width: auto"
            src="{{ $restaurant->photo ? asset('storage/' . $restaurant->photo) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png' }}"
            alt="">
    </div>



    <div class="col-12 d-flex align-items-center pt-2">
        <label for="type" class="form-label text-dark-green fw-bold pe-3 m-0">Tipo:</label>
        @foreach ($types as $type)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="type-{{ $type->id }}"
                    value="{{ $type->id }}" name="types[]" @checked(in_array($type->id, old('types', $restaurant_types ?? [])))>
                <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}</label>
            </div>
        @endforeach
    </div>
    <div class="col-12">
        <div class="mb-3 pt-3">
            <label for="description" class="form-label text-dark-green fw-bold">Descrizione:</label>
            <textarea name="description" id="description" rows="5"
                class="form-control @error('description') is-invalid @enderror" placeholder="Inserisci una descrizione">{{ old('description', $restaurant->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
<hr>
<div class="d-flex justify-content-center mb-3 mt-3">
    <button type="submit" class="btn btn-save">Salva</button>
</div>
</form>

@section('scripts')
    <script>
        // Preparo il placeholder
        const placeholder =
            'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png';

        // Prendo gli elementii dal dom
        const imageInput = document.getElementById('photo');
        const imagePreview = document.getElementById('img-preview');

        // Ascolto il cambio del caricamento file
        imageInput.addEventListener('change', () => {
            // Controllo se hoo caricato un file
            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.readAsDataURL(imageInput.files[0]);

                // Quando sei pronto (ossia quando hai preparato il dato)
                reader.onload = e => {
                    imagePreview.src = e.target.result;
                }

            } else imagePreview.setAttribute('src', placeholder);
        });
    </script>

    <script>
        // Recupero l'input group dal DOM
        const previousImageField = document.getElementById('previous-image');
        const changeImageButton = document.getElementById('change-image-button');


        const showFileInput = () => {
            imageInput.classList.remove('d-none');
            previousImageField.classList.add('d-none');
            imagePreview.setAttribute('src', placeholder);
            imageInput.click();
        }

        changeImageButton.addEventListener('click', showFileInput);
    </script>
@endsection

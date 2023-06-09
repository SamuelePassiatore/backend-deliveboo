{{-- Form --}}
@if ($plate->exists)
    <form action="{{ route('admin.plates.update', $plate->id) }}" method="POST" enctype="multipart/form-data" novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data" novalidate>
@endif


@csrf
<div class="row">
    <div class="col-3">
        <div class="mb-3">
            <label for="name" class="form-label text-dark-green fw-bold">Nome:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Inserisci un nome" name="name" required value="{{ old('name', $plate->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-3">
        <div class="mb-3">
            <label for="price" class="form-label text-dark-green fw-bold">Prezzo (€)</label>
            <input type="number" min="0.50" max="999"
                class="form-control @error('price') is-invalid @enderror" id="price"
                placeholder="Inserisci il prezzo" name="price" required value="{{ old('price', $plate->price) }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="mb-3">
            <label for="photo" class="form-label text-dark-green fw-bold">Foto:</label>
            <input type="file" class="form-control @if ($plate->photo) d-none @endif"
                @error('photo') is-invalid @enderror id="photo" name="photo"
                value="{{ old('photo', $plate->photo) }}">
            {{-- Finto upload --}}
            <div class="input-group mb-3 @if (!$plate->photo) d-none @endif" id="previous-image">
                <button class="btn btn-outline-secondary" type="button" id="change-image-button">Cambia
                    immagine</button>
                <input type="text" class="form-control" value="{{ $plate->photo }}" disabled>
            </div>
            @error('photo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-2">
        <img id="img-preview" class="img-fluid" style="height: 120px; width: auto;"
            src="{{ $plate->photo ? asset('storage/' . $plate->photo) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png' }}"
            alt="img-preview">
    </div>


    <div class="d-flex justify-content-start">
        <div class="col-2 d-flex align-items-center mt-3 mb-4">
            <div class="form-check form-switch">
                <label class="form-label text-dark-green fw-bold" for="is_visible">Disponibilità:</label>
                <input class="form-check-input" type="checkbox" role="switch" id="is_visible" name="is_visible"
                    @if (old('is_visible', $plate->is_visible)) checked @endif>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center mt-3 mb-4">
            <div class="form-check form-switch">
                <label class="form-label text-dark-green fw-bold" for="is_vegan">Vegano:</label>
                <input class="form-check-input" type="checkbox" role="switch" id="is_vegan" name="is_vegan"
                    @if (old('is_vegan', $plate->is_vegan)) checked @endif>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center mt-3 mb-4">
            <div class="form-check form-switch">
                <label class="form-label text-dark-green fw-bold" for="is_vegetarian">Vegetariano:</label>
                <input class="form-check-input" type="checkbox" role="switch" id="is_vegetarian" name="is_vegetarian"
                    @if (old('is_vegetarian', $plate->is_vegetarian)) checked @endif>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="description text-dark-green fw-bold" class="form-label">Descrizione:</label>
            <textarea name="description" id="description" rows="5"
                class="form-control @error('description') is-invalid @enderror" placeholder="Inserisci una descrizione">{{ old('description', $plate->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
<hr>
<div class="d-flex justify-content-center pt-3">
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

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
            <label for="name" class="form-label">Nome:</label>
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
            <label for="price" class="form-label">Prezzo (€)</label>
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
            <label for="photo" class="form-label">Foto:</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                name="photo" value="{{ old('photo', $plate->photo) }}">
            @error('photo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            {{-- <div class="input-group mb-3 @if (!$project->image) d-none @endif" id="prev-img">
                    <button class="btn btn-outline-secondary" type="button" id="change-image">Change image</button>
                    <input type="text" class="form-control" value="{{ $project->image }}" disabled>
                </div> --}}
        </div>
    </div>
    {{-- <div class="col-2">
            <img id="img-preview"
                src="{{ $project->image ? asset('storage/' . $project->image) : 'https://marcolanci.it/utils/placeholder.jpg' }}"
                alt="">
        </div> --}}
    <div class="d-flex justify-content-start">
        <div class="col-2 d-flex align-items-center mt-3 mb-4">
            <div class="form-check form-switch">
                <label class="form-label" for="is_visible">Disponibilità:</label>
                <input class="form-check-input" type="checkbox" role="switch" id="is_visible" name="is_visible"
                    @if (old('is_visible', $plate->is_visible)) checked @endif>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center mt-3 mb-4">
            <div class="form-check form-switch">
                <label class="form-label" for="is_vegan">Vegano:</label>
                <input class="form-check-input" type="checkbox" role="switch" id="is_vegan" name="is_vegan"
                    @if (old('is_vegan', $plate->is_vegan)) checked @endif>
            </div>
        </div>
        <div class="col-2 d-flex align-items-center mt-3 mb-4">
            <div class="form-check form-switch">
                <label class="form-label" for="is_vegetarian">Vegetariano:</label>
                <input class="form-check-input" type="checkbox" role="switch" id="is_vegetarian" name="is_vegetarian"
                    @if (old('is_vegetarian', $plate->is_vegetarian)) checked @endif>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione:</label>
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
    <button type="submit" class="btn btn-white border-dark">Salva</button>
</div>
</form>

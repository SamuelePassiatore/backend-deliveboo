<div class="container">
    @if (session('message'))
        <div class="alert alert-{{ session('type') ?? 'info' }} mt-4 alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>

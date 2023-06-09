<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="@yield('icon', asset('images/logo_base.png'))" type="image/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
        integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=='
        crossorigin='anonymous' />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('includes.navbar')
        <main>
            @include('includes.alerts.session')
            @yield('content')
        </main>
        <footer>
            <div class="container">
              <div class="row py-5 d-flex justify-content-center">
                <div class="col-10 col-md-4 text-center">
                  <ul>
                    <li><a href="#">Assistenza clienti</a></li>
                    <li><a href="#">Contattaci</a></li>
                    <li><a href="#">Termini e condizioni</a></li>
                  </ul>
                </div>
                <div class="col-10 col-md-4 text-center">
                  <ul>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Rimborsi</a></li>
                    <li><a href="#">FAQ</a></li>
                  </ul>
                </div>
        
                <div class="col-10 col-md-4 text-center">
                  <ul>
                    <li><a href="#">Sostenibilità</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Transparency Statement</a></li>
                  </ul>
                </div>
              </div>
        
            </div>
        
          </footer>
        @yield('scripts')
    </div>
</body>

</html>

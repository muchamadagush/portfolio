<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway:wght@400;700&display=swap" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')

</head>
<body>
    <div id="app">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}">Hermawan</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link" href="{{ route('skillDisplay') }}">About Me</a>
              <a class="nav-item nav-link" href="{{ route('portfolioDisplay') }}">Portfolio</a>
              <a class="nav-item nav-link" href="#">Blog</a>
              <a class="nav-item nav-link" href="{{ route('contact') }}">Contact</a>
            </div>
          </div>
        </div>
      </nav>

      <main>
          @yield('content')
      </main>
    </div>
</body>
</html>

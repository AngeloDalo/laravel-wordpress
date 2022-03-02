<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('partials.header')
        <div class="container-admin d-flex mt-5 ms-5">
            <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">
                <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                  <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link active py-3 border-bottom" aria-current="page" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                        <i class="fas fa-home"></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin.posts.create') }}" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                      <i class="fas fa-plus"></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin.categories.index') }}" class="nav-link py-3 border-bottom" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                        <i class="fas fa-calendar-alt"></i> Category
                    </a>
                  </li>
                  <li>
                    <a class="nav-link py-3 border-bottom" href="{{ route('admin.posts.indexUser') }}">
                        <i class="bi bi-files"></i> <br>
                        My Posts
                    </a>
                  </li>
                </ul>
                <div class="dropdown border-top">
                  <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
                    <span>{{ Auth::user()->name }}</span>
                  </a>
                  <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                    <li><a class="dropdown-item" href="{{ route('admin.posts.create') }}">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                  </ul>
                </div>
              </div>
    
            <main class="py-4 ms-5 ps-5">
                @yield('content')
            </main>
        </div>

        @include('partials.footer')
    </div>
</body>
</html>
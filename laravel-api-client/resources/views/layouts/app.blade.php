<!doctype html>
<html lang="hu">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Movies')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">Movies</a>
    <div class="ms-auto">
      @if(session()->has('api_token'))
        <span class="me-2">Bejelentkezve: {{ session('user_name') }}</span>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
          @csrf
          <button class="btn btn-sm btn-outline-secondary">Kijelentkezés</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Bejelentkezés</a>
      @endif
    </div>
  </div>
</nav>

<main class="py-4">
  @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

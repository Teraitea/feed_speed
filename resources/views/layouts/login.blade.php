<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ url('images/logofeedsspeed.png') }}" />
    <title>FeedSPEED | @yield('title')</title>

    <script>
        window.Laravel = {!! json_encode([
            'baseUrl' => url('/'),
        ]) !!}
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="sidebar-header">
      <img align="center" src="{{ url('images/logofeedsspeed.png') }}" width="50">
  </div>

  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link"> FeedSPEED</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
    <li class="navbar-item active">
      <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
    </li>
  </ul>
</nav>
  @yield('content')
</body>
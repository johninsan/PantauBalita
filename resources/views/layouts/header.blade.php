<head>
  
@section('headSection') @show
  <link rel="stylesheet" href="{{ asset('materialize/css/materialize.css') }}">
  <link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('materialize/css/my.css') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="UTF-8">
  <title>test</title>
</head>
<div class="navbar-fixed">
  <!-- Dropdown Structure -->
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="{{route('DaftarBalita.index')}}">Daftar Balita</a></li>
    <li><a href="{{route('Posyandu.index')}}">showPosyandu</a></li>
    <li><a href="{{route('showposyandu')}}">showjadwalPosyandu</a></li>
    <li><a href="{{route('monitor')}}">Monitor</a></li>
    <li><a href="{{route('hasilmonitor')}}">Hasil</a></li>
    <li><a href="{{route('showpost')}}">showpost</a></li>
    <li><a href="{{route('pesandetailortu')}}">pesandetailortu</a></li>
    <li><a href="{{route('pesanortu')}}">pesanortu</a></li>
  </ul>
  <ul class="dropdown-content" id="dropdownarticle">
    <li><a href="{{route('post.index')}}">Articlepost</a></li>
    <li><a href="{{route('tag.index')}}">tag</a></li>
    <li><a href="{{route('category.index')}}">category</a></li>
  </ul>
  <ul id="dropdownmobile" class="dropdown-content">
    <li><a href="{{route('DaftarBalita.index')}}">Daftar Balita</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider"></li>
    <li><a href="#!">three</a></li>
  </ul>

  <nav class="teal darken-1">
    <div class="container">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">PantauBalita</a>
        <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('testyajra') }}">Test Yajra</a></li>
          <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
          <li><a class="dropdown-trigger" href="#!" data-target="dropdownarticle">Buat Article<i class="material-icons right">arrow_drop_down</i></a></li>
          @if(!\Illuminate\Support\Facades\Session::get('login'))
          <li><a href="#modal1" class="modal-trigger">Login</a></li>
          <li><a href="{{ route('register') }}" class="waves-effect waves-light btn">Daftar</a></li>
          @else
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
               Logout
           </a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
</div>
<ul class="sidenav" id="mobile-nav">
  <li><a href="{{ route('home') }}">Home</a></li>
  <li><a href="{{ route('testyajra') }}">Test Yajra</a></li>
  <li><a class="dropdown-trigger" href="#!" data-target="dropdownmobile">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
  <li><a href="#modal1" class="modal-trigger">Login</a></li>
  <li><a href="{{ route('register') }}" class="waves-effect waves-light btn">Daftar</a></li>
</ul>

<form action="/loginpost" method="post">
  {{csrf_field()}}
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Login</h4>
      <p>Masukkan Username dan Password</p>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="uname" name="username" type="text" class="validate">
          <label for="uname">Username</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input placeholder="Minimal 6 digit" name="password" id="myPass" type="password" class="validate">
          <label for="first_name">Password</label>
        </div>
        <span id="showPass" class="push-s1">
              <i class="material-icons prefix" style="display: none;">visibility</i>
              <i class="material-icons prefix">visibility_off</i>
            </span>
      </div>
    </div>
    <div class="modal-footer">
      <a class="modal-close pink lighten-effect pink lighten-2 btn col s2 z-depth-3"><i class="material-icons left">close</i>Tutup</a>
      <button class="btn waves-effect waves-light col s2 push-s1 z-depth-3" type="submit">Login
            <i class="material-icons right">done</i>
          </button>
    </div>
  </div>
</form>
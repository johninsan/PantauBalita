@section('headSection') @show
<link rel="stylesheet" href="{{ asset('materialize/css/materialize.css') }}">
<link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('materialize/css/my.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="UTF-8">
<title>PantauBalita</title>
<div class="navbar-fixed">
  <!-- Dropdown Structure -->
  <ul class="dropdown-content" id="dropdownarticle">
    @can('roles.article',Auth::user())
    <li><a href="{{route('post.index')}}">Articlepost</a></li>
    @endcan @can('roles.tag',Auth::user())
    <li><a href="{{route('tag.index')}}">tag</a></li>
    @endcan @can('roles.category',Auth::user())
    <li><a href="{{route('category.index')}}">category</a></li>
    @endcan
  </ul>
  <ul class="dropdown-content" id="dropdownpetugas">
    <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk pantau gizi pada rw" href="{{route('cekgizi')}}">Pantau Gizi</a>
    </li>
    <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk monitor gizi pada balita" href="{{route('listortu')}}">Monitor Gizi</a>
    </li>
  </ul>
  {{-- article mobile --}}
  <ul class="dropdown-content" id="dropdownarticlemob">
    @can('roles.article',Auth::user())
    <li><a href="{{route('post.index')}}">Articlepost</a></li>
    @endcan @can('roles.tag',Auth::user())
    <li><a href="{{route('tag.index')}}">tag</a></li>
    @endcan @can('roles.category',Auth::user())
    <li><a href="{{route('category.index')}}">category</a></li>
    @endcan
  </ul>
  <ul class="dropdown-content" id="dropdownprofile">
    @can('roles.inboxpetugas',Auth::user())
    <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk melihat pesan masuk" href="{{route('pesanpetugas')}}"><i class="material-icons small ">mail</i>Pesan</a></li>
    <li class="divider"></li>
    @endcan @can('roles.inboxortu',Auth::user())
    <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk melihat pesan masuk" href="{{route('pesanortu')}}"><i class="material-icons small ">mail</i>Pesan</a></li>
    <li class="divider"></li>
    @endcan
    <li>
      <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
             Logout
         </a>
      <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>
  {{-- profilemobile --}}
  <ul class="dropdown-content" id="dropdownprofilemob">
    @can('roles.inboxpetugas',Auth::user())
    <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk melihat pesan masuk" href="{{route('pesanpetugas')}}"><i class="material-icons small ">mail</i>Pesan</a></li>
    <li class="divider"></li>
    @endcan @can('roles.inboxortu',Auth::user())
    <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk melihat pesan masuk" href="{{route('pesanortu')}}"><i class="material-icons small ">mail</i>Pesan</a></li>
    <li class="divider"></li>
    @endcan
    <li>
      <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
             Logout
         </a>
      <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </li>
  </ul>

  <nav class="teal darken-1">
    <div class="container">
      <div class="nav-wrapper">
        <a href="{{ route('home') }}" class="brand-logo">PantauBalita</a>
        <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          {{--
          <li><a href="{{ route('testyajra') }}">Test Yajra</a></li> --}}
          <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk melihat jadwal posyandu" href="{{route('showposyandu')}}">JADWAL</a></li>

          <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk membaca artikel" href="{{route('showpost')}}">ARTIKEL</a></li>

          @if(Auth::user()) @can('roles.article',Auth::user())
          <li><a class="dropdown-trigger" href="#!" data-target="dropdownarticle">Buat Article<i class="material-icons right">arrow_drop_down</i></a>
          </li>
          @endcan @can('roles.balita',Auth::user())
          <li><a <a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk monitor gizi balita" href="{{route('DaftarBalita.index')}}">BALITA</a>
          </li>
          @endcan {{-- Buat jadwal --}} @can('roles.posyandu',Auth::user())
          <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk membuat jadwal posyandu" href="{{route('Posyandu.index')}}">Buat Jadwal</a>
          </li>
          <li><a class="dropdown-trigger" href="#!" data-target="dropdownpetugas">Pantau Gizi<i class="material-icons right">arrow_drop_down</i></a>
          </li>
          @endcan @can('roles.inboxortu',Auth::user())
          <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk bertanya pada petugas" href="{{route('showpetugas')}}">Tanya petugas</a>
          </li>
          @endcan
          <li><a class="dropdown-trigger" data-target="dropdownprofile" href="#"><i class="material-icons">more_vert</i></a></li>
          @else
          <li><a href="#modal1" class="modal-trigger">LOGIN</a></li>
          <li><a href="{{ route('register') }}" class="waves-effect waves-light btn">Daftar</a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
</div>
<ul class="sidenav" id="mobile-nav">
  <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk melihat jadwal posyandu" href="{{route('showposyandu')}}">JADWAL</a></li>

  <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk membaca artikel" href="{{route('showpost')}}">ARTIKEL</a></li>

  @if(Auth::user()) @can('roles.article',Auth::user())
  <li><a class="dropdown-trigger" href="#!" data-target="dropdownarticlemob">Buat Article<i class="material-icons right">arrow_drop_down</i></a>
  </li>
  @endcan @can('roles.balita',Auth::user())
  <li><a <a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk monitor gizi balita" href="{{route('DaftarBalita.index')}}">BALITA</a>
  </li>
  @endcan {{-- Buat jadwal --}} @can('roles.posyandu',Auth::user())
  <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk membuat jadwal posyandu" href="{{route('Posyandu.index')}}">Buat Jadwal</a>
  </li>
  @endcan @can('roles.inboxortu',Auth::user())
  <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk bertanya pada petugas" href="{{route('showpetugas')}}">Tanya petugas</a>
  </li>
  @endcan
  <li><a class="dropdown-trigger" data-target="dropdownprofilemob" href="#"><i class="material-icons">more_vert</i></a></li>
  @else
  <li><a href="#modal1" class="modal-trigger">LOGIN</a></li>
  <li><a href="{{ route('register') }}" class="waves-effect waves-light btn">Daftar</a></li>
  @endif
</ul>

<form action="{{route('login')}}" method="post">
  {{csrf_field()}}
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Login</h4>
      <p>Masukkan Username dan Password</p>
      <div class="row">
        <div class="input-field col m8 s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="uname" name="username" type="text" class="validate">
          <label for="uname">Username</label>
          <span class="helper-text" data-error="wrong" data-success="right"></span>
        </div>
      </div>
      <div class="row">
        <div class="input-field col m8 s10">
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
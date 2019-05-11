@section('headSection') @show
<link rel="stylesheet" href="{{ asset('materialize/css/materialize.css') }}">
<link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('materialize/css/my.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="UTF-8">
<title>test</title>
<div class="navbar-fixed">
  <!-- Dropdown Structure -->

  <nav class="teal darken-1">
    <div class="container">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">PantauBalita</a>
        <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          {{--
          <li><a href="{{ route('testyajra') }}">Test Yajra</a></li> --}}
          <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk membuat role" href="{{route('role.index')}}">Role</a></li>
          <li><a class="tooltipped" data-position="bottom" data-tooltip="Klik untuk membuat permission" href="{{route('permission.index')}}">Permission</a></li>
          <li>
            <a href="#" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                   Logout
               </a>
            <form id="logout-form" action="#" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<ul class="sidenav" id="mobile-nav">
  <li><a href="#">Home</a></li>
  <li><a href="#" class="modal-trigger">Role</a></li>
  <li><a href="#" class="waves-effect waves-light btn">Permission</a></li>
  <li>
    <a href="#" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
           Logout
       </a>
    <form id="logout-form" action="#" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
  </li>
</ul>
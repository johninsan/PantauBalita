<html>

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('materialize/css/materialize.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('materialize/css/my.css') }}">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        body {
            background: #fff;
        }

        .input-field input[type=date]:focus+label,
        .input-field input[type=text]:focus+label,
        .input-field input[type=email]:focus+label,
        .input-field input[type=password]:focus+label {
            color: #e91e63;
        }

        .input-field input[type=date]:focus,
        .input-field input[type=text]:focus,
        .input-field input[type=email]:focus,
        .input-field input[type=password]:focus {
            border-bottom: 2px solid #e91e63;
            box-shadow: none;
        }
    </style>
</head>
@if(\Illuminate\Support\Facades\Session::has('alert-success')) {!! \Illuminate\Support\Facades\Session::get('alert-success')
!!} @endif

<body>
    <div class="section"></div>
    <main>
        <center>
            <h5 class="indigo-text">Masukkan username dan password</h5>
            <div class="section"></div>
            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form action="{{route('loginpost')}}" method="post">
                        {{csrf_field()}}
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col m12 s12'>
                                <input class='validate' type='text' name='username' id='username' />
                                <label for='username'>Masukkan username</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col m12 s12'>
                                <input class='validate' type='password' name='password' id='password' />
                                <label for='password'>Masukkan Password</label>
                            </div>
                            <label style='float: right;'>
								<a class='pink-text' href='#!'><b>Buat Akun</b></a>
							</label>
                        </div>

                        <br />
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </center>

        <div class="section"></div>
        <div class="section"></div>
    </main>

    <script src="{{ asset('materialize/js/jquery.js') }}"></script>
    <script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
</body>

</html>
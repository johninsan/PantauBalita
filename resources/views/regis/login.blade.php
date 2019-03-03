<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="{{ asset('frontend/materialize/css/materialize.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/materialize/css/materialize.min.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta charset="UTF-8">
	<title>StageNow</title>
</head> 
<body>
	@if(\Illuminate\Support\Facades\Session::has('alert-success'))
	{!! \Illuminate\Support\Facades\Session::get('alert-success') !!}
	@endif
	<div class="container">
		<h3 class="deep-orange-text text-darken-2">StageNow</h3>
		<div class="row">
			<form action="/loginPost" method="post">
				{{csrf_field()}}
				<div class="row">	
					<div class="input-field col s5">
						<i class="material-icons prefix">email</i>
						<input id="email" type="email" name="email" class="validate">
						<label for="email">Email</label>
						<span class="helper-text" data-error="wrong" data-success="right"></span>
					</div>
				</div>
				<div class="row">	
					<div class="input-field col s5">
						<i class="material-icons prefix">lock</i>
						<input placeholder="Minimal 6 digit" name="password" id="myPass" type="password" class="validate">
						<label for="first_name">Password</label>
					</div>
					<span id="showPass" class="push-s1">
						<i class="material-icons prefix" style="display: none;">panorama_fish_eye</i>
						<i class="material-icons prefix">remove_red_eye</i>
					</span>
				</div>
				<div class="row">	
					<div class="input-field col s6">
						<span>Belum punya akun? <a href="{{ route('daftar') }}">Daftar disini</a></span>
					</div>		
				</div>
				<a class="pink lighten-effect pink lighten-2 btn col s2 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
				<button class="btn waves-effect waves-light col s2 push-s1 z-depth-3" type="submit" name="action">Sign in
				</button>
				<div class="row"></div>
			</form>
		</div>
	</div>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Hubungi Kami</h5>
					<p class="grey-text text-lighten-4">StageNow, cari musisi impianmu, melalui StageNow.</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Links</h5>
					<ul>
						<li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons left">location_on</i>Politeknik Negeri Jakarta</a></li>
						<li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons left">phone</i>0895346672189</a></li>
						<li><a class="grey-text text-lighten-3" href="#!"><i class="material-icons left">email</i>stagenow@pnj.ac.id</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<strong>Copyright &copy; 2018-{{Carbon\carbon::now()->year}} StageNow.</strong>
			</div>
		</div>
	</footer>
</body>
<footer>
	<script src="{{ asset('frontend/materialize/js/jquery.js') }}"></script>
	<script src="{{ asset('frontend/materialize/js/materialize.js') }}"></script>
	<script src="{{ asset('frontend/materialize/js/materialize.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('input#notelp, textarea#alamat').characterCounter();
			$("#showPass").click(function() {
				if ($("#myPass").attr("type") == "password") {
					$("#myPass").attr("type", "text");
				} else {
					$("#myPass").attr("type", "password");
				}
			});
			$("#showPass").click(function() {
				$("#showPass i").toggle();
			});
		});

	</script>
</footer>
</html>
@extends('layouts/app') 
@section('main-content')
<section id="daftarakun" class="blue lighten-4">
	<h3 class="center light grey-text text-darken-3">Daftar Akun</h3>
</section>
<div class="container">
	<div class="row">
		<form>
			<div class="row">
				<div class="input-field col m6 s12">
					<i class="material-icons prefix">account_circle</i>
					<input id="nama" type="text" class="validate">
					<label for="nama">Nama Lengkap</label>
				</div>
				<div class="input-field col m6 s12">
					<i class="material-icons prefix">account_circle</i>
					<input id="uname" type="text" class="validate">
					<label for="uname">Username</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
			</div>
			<div class="row">
				<div class="input-field col m6 s12">
					<i class="material-icons prefix">lock</i>
					<input placeholder="Minimal 6 digit" id="password" type="password" class="validate">
					<label for="first_name">Password</label>
				</div>
				<div class="input-field col m6 s12">
					<input id="konfirm" type="password" class="validate">
					<label for="last_name">Konfirmasi Password</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col m6 s12">
					<i class="material-icons prefix">email</i>
					<input id="email" type="email" class="validate">
					<label for="email">Email</label>
					<span class="helper-text" data-error="wrong" data-success="right"></span>
				</div>
				<div class="input-field col m6 s12">
					<i class="material-icons prefix">phone</i>
					<input id="notelp" type="tel" class="validate" data-length="13">
					<label for="password">Nomor Telpon</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col m8 s12">
					<i class="material-icons prefix">mode_edit</i>
					<textarea id="alamat" class="materialize-textarea" data-length="120"></textarea>
					<label for="alamat">Alamat:</label>
				</div>
			</div>
			<div class="container">
				<div class="input-field col m6 s12">
					<span>sudah punya akun? <a href="#modal1" class="modal-trigger">login disini</a></span>
				</div>
				<div class="row">
					<div class="col m6 s12">
						<a class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
						<button class="btn waves-effect waves-light col m6 s6 push-s1 push-m2 z-depth-3" type="submit" name="action">Daftar
							<i class="material-icons right">done</i>
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
 
@section('footerSection')
<script type="text/javascript">
	$(document).ready(function(){
		M.textareaAutoResize($('#alamat'));
		$('input#notelp, textarea#alamat').characterCounter();
		$('.modal').modal();
		$('select').formSelect();
		// $(function() {
		// 	$('#salary, #money, #gaji').hide();
		// 	$('#genre').hide();
		// 	$('#type').on('change', function(event) {
		// 		var opt = this.options[ this.selectedIndex ];
		// 		var musisi = $(opt).text().match(/Musisi/i);
		// 		if(musisi) {
		// 			$('#salary, #money, #gaji').show();
		// 			$('#genre').show();
		// 		} else {
		// 			$('#salary, #money, #gaji').hide();
		// 			$('#genre').hide();
		// 		}
		// 	});
		// });
	});

</script>
@endsection
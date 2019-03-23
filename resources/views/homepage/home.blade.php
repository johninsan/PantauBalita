@extends('layouts/app') 
@section('headSection')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@endsection
 
@section('main-content') @if(\Illuminate\Support\Facades\Session::has('alert-success')) {!! \Illuminate\Support\Facades\Session::get('alert-success')
!!} @endif
<div class="slider">
	<ul class="slides">
		<li>
			<img src="/materialize/images/img/slider/1.png">
			<!-- random image -->
			<div class="caption center-align">
				<h3>This is our big Tagline!</h3>
				<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
			</div>
		</li>
		<li>
			<img src="/materialize/images/img/slider/2.png">
			<!-- random image -->
			<div class="caption left-align">
				<h3>Left Aligned Caption</h3>
				<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
			</div>
		</li>
		<li>
			<img src="/materialize/images/img/slider/3.png">
			<!-- random image -->
			<div class="caption right-align">
				<h3>Right Aligned Caption</h3>
				<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
			</div>
		</li>
		<li>
			<img src="/materialize/images/img/slider/4.png">
			<!-- random image -->
			<div class="caption center-align">
				<h3>This is our big Tagline!</h3>
				<h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
			</div>
		</li>
	</ul>
</div>
<!--about stageNow -->
<section id="about" class="about">
	<div class="container">
		<div class="row">
			<h3 class="center light">About StageNow</h3>
			<div class="col m6 light">
				<h5>We are proffesional</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab natus inventore eligendi odio, quis voluptatem nostrum aperiam
					quae nobis velit earum fugit totam, cum dolores nisi, dolorem alias molestiae? Aliquid.</p>
			</div>
			<div class="col m6">
				<p>Free</p>
				<div class="progress">
					<div class="determinate" style="width: 70%"></div>
				</div>
				<p>Project Deal</p>
				<div class="progress">
					<div class="determinate" style="width: 70%"></div>
				</div>
				<p>Musisi terpercaya</p>
				<div class="progress">
					<div class="determinate" style="width: 70%"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- parallax -->
<div class="parallax-container">
	<div class="parallax"><img src="materialize/images/img/1.jpg"></div>
	<div class="container clients">
		<h3 class="center light white-text">Tiga Langkah Mudah</h3>
		<div class="row">
			<div class="col m4 s12 center">
				<img src="materialize/images/img/clients/process1.jpg">
			</div>
			<div class="col m4 s12 center">
				<img src="materialize/images/img/clients/process2.jpg">
			</div>
			<div class="col m4 s12 center">
				<img src="materialize/images/img/clients/process3.jpg">
			</div>
		</div>
	</div>
</div>
{{-- services --}}
<section id="services" class="services grey lighten-3">
	<div class="container">
		<div class="row">
			<h3 class="center light grey-text text-darken-3">Our Services</h3>
			<div class="col m4 s12">
				<div class="card-panel center">
					<i class="material-icons medium">thumb_up</i>
					<h5>Connected</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, dolorum.</p>
				</div>
			</div>
			<div class="col m4 s12">
				<div class="card-panel center">
					<i class="material-icons medium">security</i>
					<h5>Privacy</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, dolorum.</p>
				</div>
			</div>
			<div class="col m4 s12">
				<div class="card-panel center">
					<i class="material-icons medium">access_alarms</i>
					<h5>Message Reminder</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, dolorum.</p>
				</div>
			</div>
		</div>
	</div>
</section>
{{-- portofolio --}}
<section id="portfolio" class="portfolio">
	<div class="container">
		<h3 class="center light grey-text text-darken-3">Portfolio</h3>
		<div class="row">
			<div class="col m3 s12">
				<img src="/materialize/images/img/portfolio/1.png" class="responsive-img materialboxed">
			</div>
			<div class="col m3 s12">
				<img src="/materialize/images/img/portfolio/2.png" class="responsive-img materialboxed">
			</div>
			<div class="col m3 s12">
				<img src="/materialize/images/img/portfolio/3.png" class="responsive-img materialboxed">
			</div>
			<div class="col m3 s12">
				<img src="/materialize/images/img/portfolio/4.png" class="responsive-img materialboxed">
			</div>
		</div>
		<div class="row">
			<div class="col m3 s12">
				<img src="/materialize/images/img/portfolio/5.png" class="responsive-img materialboxed">
			</div>
			<div class="col m3 s12">
				<img src="/materialize/images/img/portfolio/6.png" class="responsive-img materialboxed">
			</div>
			<div class="col m3 s12">
				<img src="/materialize/images/img/portfolio/1.png" class="responsive-img materialboxed">
			</div>
			<div class="col m3 s12">
				<img src="/materialize/images/img/portfolio/2.png" class="responsive-img materialboxed">
			</div>
		</div>
	</div>
</section>
{{-- contact --}}
<section id="contact" class="contact grey lighten-3">
	<div class="container">
		<div class="row">
			<h3 class="center light grey-text text-darken-3">Contact Us</h3>
			<div class="col m5 s12">
				<div class="card-panel blue darken-2 center white-text">
					<i class="material-icons">email</i>
					<h5>Contact</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, nihil.</p>
				</div>
				<ul class="collection with-header">
					<li class="collection-header">
						<h4>Buat Skripsi</h4>
					</li>
					<li class="collection-item">Ini serius</li>
					<li class="collection-item">Semoga lulus</li>
					<li class="collection-item">Semangat semua</li>
				</ul>
			</div>
			<div class="col m7 s12">
				<form action="#">
					<div class="card-panel">
						<h5>Please fill out this form</h5>
						<div class="input-field">
							<input type="text" id="name" name="name" class="validate" required>
							<label for="name">Nama</label>
						</div>
						<div class="input-field">
							<input type="email" id="email" name="email" class="validate">
							<label for="email">Email</label>
						</div>
						<div class="input-field">
							<input type="text" id="phone" name="phone">
							<label for="phone">Phone</label>
						</div>
						<div class="input-field">
							<textarea name="message" id="message" class="materialize-textarea"></textarea>
							<label for="message">Message</label>
						</div>
						<button type="submit" class="btn blue darken-2">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
 
@section('footerSection')
<script type="text/javascript">
	$('.carousel.carousel-slider').carousel({
		fullWidth: true,
		indicators: true
	});
	$('.parallax').parallax();
	$('.collapsible').collapsible();
	$('.scrollspy').scrollSpy();

</script>
@endsection
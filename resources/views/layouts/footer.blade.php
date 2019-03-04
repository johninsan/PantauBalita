<footer class="page-footer teal darken-1">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<p class="grey-text text-lighten-4 flow-text">Pantau kesehatan balitamu, melalui PantauBalita.</p>
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
<script src="{{ asset('materialize/js/jquery.js') }}"></script>
<script src="{{ asset('materialize/js/materialize.js') }}"></script>
<script src="{{ asset('materialize/js/materialize.min.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
	const slider = document.querySelectorAll('.slider');
	M.Slider.init(slider,{
		indicators:false,
		height: 500,
		transition: 600,
		interval: 3000
	});
	$('.materialboxed').materialbox();
	$('.sidenav').sidenav();
	$(".dropdown-trigger").dropdown();
	$('select').formSelect();
	$('.modal').modal();
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
	// $('.slider').slider();

</script>

@section('footerSection') @show
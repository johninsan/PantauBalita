@extends('layouts.app') 
@section('headSection')
@endsection
 
@section('main-content')
<section class="grey lighten-3">
	<h3 class="grey-text light center">Jumlah gizi pada RW</h3>
</section>
<section>
	<div class="container">
		<canvas id="myChart"></canvas>
	</div>
</section>
<div class="container">
	<div class="row">
		<div class="col m6 s12">
			<a href="{{route('cekgizi')}}" class="pink lighten-effect pink lighten-2 btn col m6 s6 z-depth-3"><i class="material-icons left">arrow_back</i>Kembali</a>
		</div>
	</div>
</div>
@endsection
 
@section('footerSection')
<script src="{{ asset('materialize/js/Chart.js') }}"></script>
<script type="text/javascript">
	$(document).ready( function () {
        var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Gizi Buruk", "Gizi Kurang", "Sehat", "Gizi Lebih", "Obesitas"],
				datasets: [{
					label: 'Jumlah Gizi setiap RW',
					data: [{{$GB}}, {{$GK}}, {{$sehat}}, {{$GiziL}}, {{$O}}],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)'
					],
					borderWidth: 1
				}]
			},
		});
});

</script>
@endsection
@extends('layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<section class="grey lighten-3">
	<h3 class="grey-text light center">List gizi</h3>
</section>
<section>
	<div class="container">
		<canvas id="myChart"></canvas>
	</div>
</section>
<div class="container">
	<div class="row">
		<table id="myTable" class="highlight centered responsive-table">
			<thead>
				<tr>
					<th>S.No</th>
					<th>Nama</th>
					<th>Berat</th>
					<th>Umur</th>
					<th>Gizi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($list as $x)
				<tr>
					<td>{{$loop -> index +1}}</td>
					<td>{{$x->nama}}</td>
					<td>{{$x->beratbadan}} Kilogram</td>
					<td>{{$x->umur}} Bulan</td>
					@if($x->status == 1)
					<td>Gizi Buruk</td>
					@elseif($x->status == 2)
					<td>Gizi Kurang</td>
					@elseif($x->status == 3)
					<td>Sehat</td>
					@elseif($x->status == 4)
					<td>Gizi Lebih</td>
					@elseif($x->status == 5)
					<td>Obesitas</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
 
@section('footerSection')
<script src="{{ asset('materialize/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('materialize/js/Chart.js') }}"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
        var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: {!!json_encode($bulan['months'])!!},
				datasets: [{
					label: '1 = Gizi Buruk, 2 = Kurang Gizi, 3 = Sehat, 4 = Gizi Lebih, 5 = Obesitas',
					data: {!!json_encode($bulan['status_data'])!!},
					backgroundColor: [
					'rgba(0, 0, 0, 0)'
					],
					borderColor: [
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
});

</script>
@endsection
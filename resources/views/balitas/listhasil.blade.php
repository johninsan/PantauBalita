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
                    @if($x->gb == 1)
                    <td>Gizi Buruk</td> @elseif($x->gk ==1)
                    <td>Gizi Kurang</td> @elseif($x->s ==1)
                    <td>Sehat</td> @elseif($x->gl ==1)
                    <td>Gizi Lebih</td> @elseif($x->o ==1)
                    <td>Obesitas</td> @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
 
@section('footerSection')
<script src="{{ asset('materialize/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('materialize/js/chart.js') }}"></script>
<script type="text/javascript">
    $(document).ready( function () {
		$('#myTable').DataTable();
        var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: {!!json_encode($bulan)!!},
				datasets: [{
					label: '# of Votes',
					data: [12, 19],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
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
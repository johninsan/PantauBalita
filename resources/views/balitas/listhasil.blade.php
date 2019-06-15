@extends('layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">List gizi</h3>
</section>
<section>
    <h3 class="light center">disini akan ada chart</h3>
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
<script type="text/javascript">
    $(document).ready( function () {
		$('#myTable').DataTable();
	} );

</script>
@endsection
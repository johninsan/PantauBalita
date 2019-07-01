@extends('layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">Nama Balita</h3>
</section>
<div class="container">
    @include('includes.messages')
    <div class="row">
    </div>
    <div class="row">
        <table id="myTable" class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Nama</th>
                    <th>Tempat Lahit</th>
                    <th>RW</th>
                    <th>Monitor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $lists)
                <tr>
                    <td>{{$loop -> index +1}}</td>
                    <td>{{$lists->nama}}</td>
                    <td>{{$lists->pob}}</td>
                    <td>{{$lists->rw_id}}</td>
                    <td><a href="{{route('isidata',$lists->id)}}"><i class="material-icons">edit</i></a></td>
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
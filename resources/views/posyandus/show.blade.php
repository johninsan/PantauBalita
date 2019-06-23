@extends('layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">Jadwal Posyandu</h3>
</section>
<div class="container">
    <div class="row">
    @include('includes.messages')
        <a href="{{route('Posyandu.create')}}" class="pink lighten-effect deep-orange lighten-1 btn col m2 s12 z-depth-3"><i class="material-icons right">add</i>Tambah</a>
    </div>
    <div class="row">
        <table id="myTable" class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>RW</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posyandus as $posyandu)
                <tr>
                    <td>{{$loop -> index +1}}</td>
                    @foreach(\App\Model\Posyandu\rw::where('id',$posyandu->rw_id)->get() as $y)
                    <td>{{$y ->rw}}</td>
                    @endforeach
                    <td>{{$posyandu->deskripsi}}</td>
                    <td>{{\Carbon\Carbon::parse($posyandu->tanggal)->format('d F Y')}}</td>
                    <td><a href="{{route('Posyandu.edit',$posyandu ->id)}}"><i class="material-icons">edit</i></a></td>
                    <td>
                        <form method="post" id="delete-form-{{$posyandu->id}}" action="{{route('Posyandu.destroy',$posyandu ->id)}}" style="display: none">
                            {{csrf_field()}} {{method_field('DELETE')}}
                        </form>
                        <a href="" onclick="
                                if(confirm('Are you sure?'))
                                {
                                event.preventDefault();document.getElementById('delete-form-{{$posyandu->id}}').submit();
                                }
                                else{
                                event.preventDefault();
                                }"><i class="material-icons">delete</i></a>
                    </td>
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
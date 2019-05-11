@extends('admin.layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">Permissions</h3>
</section>
<div class="container">
    <div class="row">
        <a href="{{route('permission.create')}}" class="pink lighten-effect deep-orange lighten-1 btn col m2 s12 z-depth-3"><i class="material-icons right">add</i>Tambah</a>
    </div>
    <div class="row">
        <table id="myTable" class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>permission</th>
                    <th>for</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <td>{{$loop -> index +1}}</td>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->for}}</td>
                    <td><a href="{{route('permission.edit',$permission ->id)}}"><i class="material-icons">edit</i></a></td>
                    <td>
                        <form method="post" id="delete-form-{{$permission->id}}" action="{{route('permission.destroy',$permission ->id)}}" style="display: none">
                            {{csrf_field()}} {{method_field('DELETE')}}
                        </form>
                        <a href="" onclick="
                                if(confirm('Are you sure?'))
                                {
                                event.preventDefault();document.getElementById('delete-form-{{$permission->id}}').submit();
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
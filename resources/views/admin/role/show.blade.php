@extends('admin.layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">Roles</h3>
</section>
<div class="container">
    <div class="row">
        <a href="{{route('role.create')}}" class="pink lighten-effect deep-orange lighten-1 btn col m2 s12 z-depth-3"><i class="material-icons right">add</i>Tambah</a>
    </div>
    <div class="row">
        <table id="myTable" class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>role name</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{$loop -> index +1}}</td>
                    <td>{{$role->name}}</td>
                    <td><a href="{{route('role.edit',$role ->id)}}"><i class="material-icons">edit</i></a></td>
                    <td>
                        <form method="post" id="delete-form-{{$role->id}}" action="{{route('role.destroy',$role ->id)}}" style="display: none">
                            {{csrf_field()}} {{method_field('DELETE')}}
                        </form>
                        <a href="" onclick="
                                if(confirm('Are you sure?'))
                                {
                                event.preventDefault();document.getElementById('delete-form-{{$role->id}}').submit();
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
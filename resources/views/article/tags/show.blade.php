@extends('layouts.app') 
@section('headSection')
<link rel="stylesheet" href="{{ asset('materialize/datatable/datatables.min.css') }}">
@endsection
 
@section('main-content')
<section class="grey lighten-3">
    <h3 class="grey-text light center">Tags</h3>
</section>
<div class="container">
    @include('includes.messages')
    <div class="row">
        <a href="{{route('tag.create')}}" class="pink lighten-effect deep-orange lighten-1 btn col m2 s12 z-depth-3"><i class="material-icons right">add</i>Tambah</a>
    </div>
    <div class="row">
        <table id="myTable" class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Tag</th>
                    <th>Slug</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{$loop -> index +1}}</td>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>
                    <td><a href="{{route('tag.edit',$tag ->id)}}"><i class="material-icons">edit</i></a></td>
                    <td>
                        <form method="post" id="delete-form-{{$tag->id}}" action="{{route('tag.destroy',$tag ->id)}}" style="display: none">
                            {{csrf_field()}} {{method_field('DELETE')}}
                        </form>
                        <a href="" onclick="
                                if(confirm('Are you sure?'))
                                {
                                event.preventDefault();document.getElementById('delete-form-{{$tag->id}}').submit();
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
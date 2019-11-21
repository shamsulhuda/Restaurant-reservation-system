@extends('layouts.app')

@section('title', 'Gallery')



@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.message')
                <a href="{{ route('gallery.create') }}" class="btn btn-info btn-sm">Add new gallery</a>
                <a href="{{ route('info.index') }}" class="btn btn-info btn-sm">gallery details</a>
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Gallery Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="sliderTable" class="table table-striped" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($galleryinfo as $key=>$gallery)
                        	<tr>
                            <td>{{ $key + 1 }}</td>
                        		<td>{{ $gallery->title }}</td>
                        		<td>
                            <img src="{{asset('uploads/gallery/'.$gallery->image)}}" style="width: 70px; height: 50px;">  
                            </td>
                        		<td>{{ $gallery->created_at }}</td>
                        		<td>{{ $gallery->updated_at }}</td>
                            <td>
                              <a href="{{route('gallery.edit',$gallery->id)}}" class="btn btn-info btn-sm"><i class="material-icons"> edit </i>
                              </a>

                              <form id="delete-{{$gallery->id}}" action="{{route('gallery.destroy',$gallery->id)}}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                              </form>

                              <button type="submit" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure want to delete this item?')) {
                                event.preventDefault();
                                document.getElementById('delete-{{$gallery->id}}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="material-icons"> delete </i></button>
                            </td>
                        	</tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
    $('#sliderTable').DataTable();
} );
</script>
@endpush

@extends('layouts.app')

@section('title', 'Site Information')



@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.message')
                <a href="{{ route('gallery.index') }}" class="btn btn-info btn-sm">Back to gallery</a>
                <a href="{{ route('info.create') }}" class="btn btn-info btn-sm">Add gallery details</a>
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Gallery info Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="sliderTable" class="table table-striped" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Galley name</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($siteinformation as $key=>$siteinfo)
                        	<tr>
                            <td>{{ $key + 1 }}</td>
                        		<td>{{ str_limit($siteinfo->description, 80) }}</td>
                        		<td>{{ $siteinfo->gallery->title }}</td>
                            <td>
                              <a href="{{route('info.edit',$siteinfo->id)}}" class="btn btn-info btn-sm"><i class="material-icons"> edit </i>
                              </a>

                              <form id="delete-{{$siteinfo->id}}" action="{{route('info.destroy',$siteinfo->id)}}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                              </form>

                              <button type="submit" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure want to delete this item?')) {
                                event.preventDefault();
                                document.getElementById('delete-{{$siteinfo->id}}').submit();
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

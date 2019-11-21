@extends('layouts.app')

@section('title', 'item')



@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.message')
              <a href="{{ route('item.create') }}" class="btn btn-info btn-sm">Add new Item</a>
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Item Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="sliderTable" class="table table-striped" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>image</th>
                        <th>Category name</th>
                        <th>description</th>
                        <th>price</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($items as $key=>$item)
                        	<tr>
                            <td>{{ $key + 1 }}</td>
                        		<td>{{ $item->name }}</td>
                            <td>
                              <img src="{{asset('uploads/item/'.$item->image)}}" style="height: 50px; width: 70px;">
                            </td>
                            <td>{{ $item->category->name }}</td>
                        		<td>{{ str_limit($item->description, 25) }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                              <a href="{{route('item.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="material-icons"> edit </i>
                              </a>

                              <form id="delete-{{$item->id}}" action="{{route('item.destroy',$item->id)}}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                              </form>

                              <button type="submit" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure want to delete this item?')) {
                                event.preventDefault();
                                document.getElementById('delete-{{$item->id}}').submit();
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

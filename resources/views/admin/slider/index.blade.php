@extends('layouts.app')

@section('title', 'Slider')



@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.message')
              <a href="{{ route('slider.create') }}" class="btn btn-info btn-sm">Add new slider</a>
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Slider Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="sliderTable" class="table table-striped" style="width:100%">
                      <thead class=" text-primary">
                        <th>Slider Title</th>
                        <th>Slider subtitle</th>
                        <th>Image</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($sliders as $key=>$slider)
                        	<tr>
                        		<td>{{ $slider->title }}</td>
                        		<td>{{ $slider->sub_title }}</td>
                        		<td>
                              <img src="{{asset('uploads/slider/'.$slider->image)}}" style="height: 50px; width: 70px">
                            </td>
                        		<td>{{ $slider->created_at }}</td>
                        		<td>{{ $slider->updated_at }}</td>
                            <td>
                              <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-info btn-sm"><i class="material-icons"> edit </i>
                              </a>

                              <form id="delete-{{$slider->id}}" action="{{route('slider.destroy',$slider->id)}}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                              </form>

                              <button type="submit" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure want to delete this item?')) {
                                event.preventDefault();
                                document.getElementById('delete-{{$slider->id}}').submit();
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

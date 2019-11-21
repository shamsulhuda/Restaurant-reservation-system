@extends('layouts.app')

@section('title', 'Contacts')



@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.message')

              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">contact Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="contactTable" class="table table-striped" style="width:100%">
                      <thead class=" text-primary">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Sended at</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($contacts as $key=>$contact)
                        	<tr>
                        		<td>{{ $contact->name }}</td>
                        		<td>{{ $contact->email }}</td>
                        		<td>{{ $contact->subject }}</td>
                        		<td>
                            {{ \Carbon\Carbon::parse($contact->created_at)->format('l, d-M-Y \a\t h:i A')}}  
                            </td>
                            <td>
                              <a href="{{route('contact.show',$contact->id)}}" class="btn btn-info btn-sm" title="view message" data-toggle="tooltip"><i class="material-icons">remove_red_eye</i>
                              </a>

                              <form id="delete-{{$contact->id}}" action="{{route('contact.destroy',$contact->id)}}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                              </form>

                              <button type="submit" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure want to delete this item?')) {
                                event.preventDefault();
                                document.getElementById('delete-{{$contact->id}}').submit();
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
    $('#contactTable').DataTable();
} );
</script>
@endpush

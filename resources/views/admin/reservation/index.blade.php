@extends('layouts.app')

@section('title', 'Reservation')



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
                  <h4 class="card-title ">Reservation Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="reservationTable" class="table table-striped" style="width:100%">
                      <thead class=" text-primary">
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Date & Time</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($reservations as $key=>$reservation)
                        	<tr>
                        		<td>{{ $reservation->name }}</td>
                        		<td>{{ $reservation->phone }}</td>
                        		<td>{{ $reservation->email }}</td>
                        		<td>{{ $reservation->date_and_time }}</td>
                            <td>{{ str_limit($reservation->message, 20) }}</td>
                            <td>
                              @if($reservation->status == true)

                              <span class="badge badge-info">Confirmed</span>
                              @else
                              <span class="badge badge-danger">Not confirmed yet!</span>

                              @endif
                            </td>
                            <td>
                              @if($reservation->status == false)

                                <form id="status-{{$reservation->id}}" action="{{route('reservation.status',$reservation->id)}}" style="display: none;" method="POST">
                                  @csrf
                                </form>

                                <button type="submit" class="btn btn-info btn-sm" onclick="if (confirm('Are verified this reservation by phone?')) {
                                  event.preventDefault();
                                  document.getElementById('status-{{$reservation->id}}').submit();
                                }else{
                                  event.preventDefault();
                                }"><i class="material-icons"> done </i></button>

                              @endif

                              <form id="delete-{{$reservation->id}}" action="{{route('reservation.delete',$reservation->id)}}" style="display: none;" method="POST">
                                @csrf
                                @method('DELETE')
                              </form>

                              <button type="submit" class="btn btn-danger btn-sm" onclick="if (confirm('Are you sure want to delete this reservation?')) {
                                event.preventDefault();
                                document.getElementById('delete-{{$reservation->id}}').submit();
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
    $('#reservationTable').DataTable();
} );
</script>
@endpush

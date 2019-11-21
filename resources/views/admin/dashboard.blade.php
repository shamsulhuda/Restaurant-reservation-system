@extends('layouts.app')

@section('title', 'Dashboard')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Category & Item</p>
              <h3 class="card-title">{{$categoryCount}}/{{$itemCount}}
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">content_copy</i>
                <a href="{{route('item.index')}}">Categories & Items</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">slideshow</i>
              </div>
              <p class="card-category">Sliders</p>
              <h3 class="card-title">{{$sliderCount}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">slideshow</i> Add more slider
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Reservation</p>
              <h3 class="card-title">{{ $reservations->count() }}/{{$reservationconf}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">info</i> Pending & confirmed Reservations
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">phone</i>
              </div>
              <p class="card-category">Contacts</p>
              <h3 class="card-title">{{$contact}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Total contacts
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
            <div class="col-md-12">

              @include('layouts.partial.message')

              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Pending reservations</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="reservationTable" class="table table-striped" style="width:100%">
                      <thead class=" text-primary">
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($reservations as $key=>$reservation)
                          <tr>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->phone }}</td>
                            <td>{{ $reservation->date_and_time }}</td>
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
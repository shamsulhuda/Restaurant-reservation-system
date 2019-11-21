@extends('layouts.app')

@section('title', 'Contacts')



@push('css')

@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.message')
              <a href="{{route('contact.index')}}" class="btn btn-info btn-sm">Back</a>
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">{{$contact->name}}'s message</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8 mx-auto">
                      
                      <div class="row">
                        <div class="col-md-7">
                          <p>Email: <strong>{{$contact->email}}</strong></p>
                        </div>
                        <div class="col-md-5">
                          <span>
                            <i class="fa fa-share"></i> {{ \Carbon\Carbon::parse($contact->created_at)->format('l, d-M-Y \a\t h:i A')}}
                          </span>
                        </div>
                      </div>
                      <h5><strong>Subject: </strong>{{ $contact->subject }}</h5>
                      <h5><strong>Message: </strong></h5>
                      <p>{{ $contact->message }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@push('scripts')

@endpush

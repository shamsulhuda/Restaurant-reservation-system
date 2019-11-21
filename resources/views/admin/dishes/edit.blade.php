@extends('layouts.app')

@section('title', 'Dish | edit')
@push('css')
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Add New dish</h4>
                </div>
                <div class="card-body">
                  <div class="col-md-8 mx-auto">
                    <form method="POST" action="{{route('dish.update',$dish->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      <div class="form-group">
                        <label for="name" class="bmd-label-floating">Name</label>
                        <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$dish->name}}">

                        @error('name')

                        <div class="alert alert-danger py-1">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                          </button>
                          <span>
                            <b> Danger - </b>{{ $message }}</span>
                        </div>
                        @enderror

                      </div>
                      <div class="float-right">
                        <a href="{{ route('dish.index') }}" class="btn btn-danger btn-sm">Back</a>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                      </div>
                  </form>
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

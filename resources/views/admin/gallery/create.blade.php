@extends('layouts.app')

@section('title', 'Gallery | create')
@push('css')
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Add New gallery</h4>
                </div>
                <div class="card-body">
                  <div class="col-md-8 mx-auto">
                    <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-group">
                        <label for="title" class="bmd-label-floating">Title</label>
                        <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror">

                        @error('title')

                        <div class="alert alert-danger py-1">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                          </button>
                          <span>
                            <b> Danger - </b>{{ $message }}</span>
                        </div>
                        @enderror

                      </div>
                      <div>
                        <label for="image" class="bmd-label-floating">Gallery Image</label>
                        <input id="image" type="file" name="image" class="form-control @error('image') is-invalid @enderror">

                        @error('image')

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
                        <a href="{{ route('gallery.index') }}" class="btn btn-danger btn-sm">Back</a>
                        <button class="btn btn-info btn-sm">Save</button>
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

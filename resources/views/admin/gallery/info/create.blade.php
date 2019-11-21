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
                    <form action="{{route('info.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                      <div class="form-group">
                        <label for="gallery_id" class="bmd-label-floating">Select gallery</label>
                        <select name="gallery_id" class="form-control @error('gallery_id') is-invalid @enderror">
                          <option selected disabled>--Select gallery--</option>
                          @foreach($galleries as $gallery)
                            <option value="{{$gallery->id}}">{{$gallery->title}}</option>
                          @endforeach
                        </select>

                        @error('gallery_id')

                        <div class="alert alert-danger py-1">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                          </button>
                          <span>
                            <b> Danger - </b>{{ $message }}</span>
                        </div>
                        @enderror

                      </div>

                      <div class="form-group">
                        <label for="description" class="bmd-label-floating">Description</label>
                        <textarea id="description" rows="10" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>

                        @error('description')

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
                        <a href="{{ route('info.index') }}" class="btn btn-danger btn-sm">Back</a>
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

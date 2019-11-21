@extends('layouts.app')

@section('title', 'Dishitem | edit')
@push('css')
@endpush

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Add New Dishitem</h4>
                </div>
                <div class="card-body">
                  <div class="col-md-8 mx-auto">
                    <form method="POST" action="{{route('dishitem.update',$dishitem->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      <div class="form-group">
                        <label for="name" class="bmd-label-floating">Name</label>
                        <input id="name" type="text" name="name" value="{{$dishitem->name}}" class="form-control @error('name') is-invalid @enderror">

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
                      <div class="form-group">
                        <label for="category_id" class="bmd-label-floating"> Dishes</label>
                        <select name="dish_id" class="form-control @error('dish_id') is-invalid @enderror">
                          @foreach($dishes as $key=>$dish)

                          <option {{ $dish->id == $dishitem->dish->id ? 'selected' : ''}} value="{{ $dish->id }}">{{ $dish->name }}</option>

                          @endforeach
                        </select>
                        @error('dish_id')
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
                        <label class="bmd-label-floating" for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{$dishitem->description}}</textarea>

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


                      <div class="form-group">
                        <label for="price" class="bmd-label-floating">Price</label>
                        <input id="price" type="number" value="{{$dishitem->price}}" min="0" oninput="validity.valid||(value='');" name="price" class="form-control @error('price') is-invalid @enderror">

                        @error('price')
                        <div class="alert alert-danger py-1">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                          </button>
                          <span>
                            <b> Danger - </b>{{ $message }}</span>
                        </div>
                        @enderror

                      </div>

                      <div class="">
                        <label for="image" class="">Select dishitem Image</label>
                        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror">

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
                        <a href="{{ route('dishitem.index') }}" class="btn btn-danger btn-sm">Back</a>
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

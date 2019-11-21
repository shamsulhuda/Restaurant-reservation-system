@extends('layouts.app')

@section('title', 'item | edit')
@push('css')
@endpush

@section('content')
	<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Add New item</h4>
                </div>
                <div class="card-body">
                  <div class="col-md-8 mx-auto">
                    <form method="POST" action="{{route('item.update',$item->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                      <div class="form-group">
                        <label for="name" class="bmd-label-floating">Name</label>
                        <input id="name" type="text" name="name" value="{{$item->name}}" class="form-control @error('name') is-invalid @enderror">

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
                        <label for="category_id" class="bmd-label-floating"> Category</label>
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                          @foreach($categories as $key=>$category)

                          <option {{ $category->id == $item->category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>

                          @endforeach
                        </select>
                        @error('category_id')
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
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{$item->description}}</textarea>

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
                        <input id="price" type="number" value="{{$item->price}}" min="0" oninput="validity.valid||(value='');" name="price" class="form-control @error('price') is-invalid @enderror">

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
                        <label for="image" class="">Select item Image</label>
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
                        <a href="{{ route('item.index') }}" class="btn btn-danger btn-sm">Back</a>
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

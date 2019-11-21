@extends('layouts.app')

@section('title', 'Login')
@push('css')
@endpush

@section('content')
<div class="container">
  <div class="mt-5"></div>
    <div class="row">
        <div class="col-md-8 offset-md-1">
            <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Login</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email" class="bmd-label-floating">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                                <span>
                                    <label class="form-check-label" for="remember">{{ __('Remember') }}</label>
                                </span>
                              </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                              <div class="col mx-auto">
                                  <button type="submit" class="btn btn-info btn-sm">
                                      {{ __('Login') }}
                                  </button>
                              </div>
                          </div>
                      </div>
{{--  --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

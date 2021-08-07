@extends('layouts.app')
@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">Login</h1>
                </div>
                <div class="col-lg-6 text-lg-right">

                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="row">
            <div class="col-6 offset-3">
                <h2 class="h5 text-uppercase mb-4">{{__('login')}}</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                       <div class="col-12">
                           <div class="form-group">
                               <label for="user_name" class="text-small text-uppercase">USERNAME</label>
                                   <input id="user_name" type="text" class="form-control form-control-lg @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                                   @error('user_name')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                   @enderror

                           </div>
                       </div>
                       <div class="col-12">
                        <div class="form-group ">
                            <label for="password" class="text-small text-uppercase">{{ __('Password') }}</label>


                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                            </div>
                       <div class="form-group col-lg-6 ">

                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="custom-control-label text-small" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>

                            </div>
                        </div>
                      <div class="col-12">
                        <div class="form-group ">

                                <button type="submit" class="btn btn-dark">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                        </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('content')

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">{{ __('Reset Password') }}</h1>
                </div>
                <div class="col-lg-6 text-lg-right">

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="row">
            <div class="col-6 offset-3">
                <h2 class="h5 text-uppercase mb-4">{{ __('Reset Password') }}</h2>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email" class="text-small text-uppercase">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="password" class="text-small text-uppercase">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                   @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password-confirm" class="text-small text-uppercase">{{ __('Confirm Password') }}</label>


                                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>

                            </div>

                        </div>



                    </div>


                </form>

            </div>
        </div>
    </section>



@endsection

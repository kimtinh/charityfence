@extends('view.layouts.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <main class="main register">
        <section id="auth-container" class="py-2">
            <div class="container">
                <div class="top-introduce py-2">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center">
                            <article class="w-100">
                                <div class="card card-shadow">
                                    <div class="card-body p-4">
                                        <h3 class="mb-3">Register</h3>
                                        <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                            <div class="form-group">
                                                <label for="name">{{ __('Name') }}</label>
                                                <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required  autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="number_phone">{{ __('Phone number') }}</label>
                                                        <input id="number_phone" type="text" class="form-control @error('password') is-invalid @enderror" name="number_phone" value="{{ old('number_phone') }}" required>
                                                        @error('number_phone')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="password">{{ __('Password') }}</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="password-confirm">Confirm Password</label>
                                                        <input id="password-confirm" type="password" class="form-control"
                                                            name="password_confirmation" required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6">
                            <img width="100%" class="my-3" src="https://kindmate.net/svg/donation.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
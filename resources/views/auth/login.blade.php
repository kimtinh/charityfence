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
                                        <h3 class="mb-3">Login</h3>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email">E-Mail Address</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value=""
                                                    required="" autofocus="">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                                    required="">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary">
                                                    Login
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
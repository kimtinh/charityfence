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
                        <div class="col-md-6 d-flex align-items-center mx-auto">
                            <article class="w-100">
                                <div class="card card-shadow">
                                    <div class="card-body p-4">
                                        <h3 class="mb-3">Change Password</h3>
                                        <form method="POST" action="{{ route('view.update-password') }}">
                                            @csrf

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
                                            <div class="form-group">
                                                <label for="password">New password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="new_password"
                                                    required="">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Confirm password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="new_password_confirmation"
                                                    required="">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-0 d-flex justify-content-between">
                                                <a href="{{ url()->previous() }}" class="btn btn-info bg-info text-white">
                                                    Cancel
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    Change
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
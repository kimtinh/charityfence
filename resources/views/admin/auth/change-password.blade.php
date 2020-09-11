@extends('admin.layouts.base')
@section('title', 'Change Password')
@section('content')
<div class="row">
    <div class="card col-8 mx-auto">
        <div class="card-header card-header-primary">
            Change Password
        </div>
        <form class="card-body mt-4" action="{{route('admin.update-password')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Old password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group mt-4">
                <label for="">New password</label>
                <input type="password" class="form-control" name="new_password">
            </div>
            <div class="form-group mt-3">
                <label for="">Confirm password</label>
                <input type="password" class="form-control" name="new_password_confirmation">
            </div>
            <div class="form-group d-flex justify-content-between">
                <a class="btn btn-info btn-sm" href="{{ url()->previous() }}">Cancel</a>
                <button type="submit" class="btn btn-primary btn-sm">Change</button>
            </div>
        </form>
    </div>
</div>
@endsection
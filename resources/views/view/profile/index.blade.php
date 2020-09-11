@extends('view.layouts.base')
@section('css')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection
@section('content')
<?php $check = $user->id??-1 == Auth()->user()->id??0; ?>

<main class="main mt-5">
    <section class="my-2 container">
        <div class="row">
            <div class="col-md-3">
                <nav class="nav-profile">
                    <ul class="list-profile">
                        <li class="">
                            <a class="active" href="javascript:void(0)">Trang cá nhân</a>
                        </li>
                        <li class="">
                            <a class="" href="{{route('view.profile-campaign', $user->id)}}">Chiến dịch đã tạo</a>
                        </li>
                        <li class="">
                            <a class="" href="{{route('view.profile-articles', $user->id)}}">Tin tức đã tạo</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                <form class="row" action="{{route('view.edit-profile', $user->id)}}" method="post" id="registrationForm" enctype="multipart/form-data">
                    @if($check)
                        @csrf
                    @endif
                    <div class="col-sm-3">
                        <!--left col-->
                        <label for="avatar-user" class="text-center">
                            <img src="{{asset( $user->avatar ?? 'images/user.png')}}"
                                class="avatar-profile img-circle img-thumbnail" width="200px" alt="avatar">
                            <h6 class="mt-3">Change Avatar</h6>
                            <input id="avatar-user" type="file" hidden name="avatar" class="text-center center-block file-upload">
                        </label>
                        </hr><br>
                    </div>
                    <!--/col-3-->
                    <div class="col-sm-9">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="">
                                    <h1>{{$user->name}}</h1>
                                </div>
                                <hr>
                                <div class="form">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="name">
                                                <h4>User name</h4>
                                            </label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                placeholder="first name" value="{{$user->name}}" title="enter your first name if any.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="number_phone">
                                                <h4>Phone</h4>
                                            </label>
                                            <input type="number" class="form-control" min=0 name="number_phone" id="number_phone"
                                                placeholder="enter phone" value="{{$user->number_phone}}" title="enter your phone number if any.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email">
                                                <h4>Email</h4>
                                            </label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="you@email.com" value="{{$user->email}}" title="enter your email.">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <h4>Price Total: <span>0</span></h4>
                                        </div>
                                    </div>
                                    
                                    @if($check)
                                    <div class="form-group button-profile">
                                        <div class="col-xs-12 pt-2 d-flex justify-content-between">
                                            <button class="btn border" type="reset">
                                                <i class="glyphicon glyphicon-repeat"></i> Hủy
                                            </button>
                                            <button class="btn btn-success" type="submit">
                                                <i class="glyphicon glyphicon-ok-sign"></i> Lưu
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <hr>
                            </div>
                            <!--/tab-pane-->
                        </div>
                        <!--/tab-content-->
                    </div>
                    <!--/col-9-->
                </form>
            <!--/row-->
            <div>
            <!-- end col -->
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.avatar-profile').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".file-upload").on('change', function(){
            readURL(this);
        });
        @if(!$check)
            $('#registrationForm input').prop('disabled', true);
        @endif
    });
</script>
@endsection
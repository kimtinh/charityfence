@extends('admin.layouts.base')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                <i class="material-icons">perm_identity</i>
                </div>
                <p class="card-category">User</p>
                <h3 class="card-title">{{$user}}
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{route('admin.user.index')}}">Get More</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                <i class="material-icons">pages</i>
                </div>
                <p class="card-category">Campaign</p>
                <h3 class="card-title">{{$campaign}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{route('admin.campaign.index')}}">Get More</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                <i class="material-icons">wysiwyg</i>
                </div>
                <p class="card-category">Post</p>
                <h3 class="card-title">{{$post}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{route('admin.post.index')}}">Get More</a>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                <i class="material-icons">face</i>
                </div>
                <p class="card-category">Difficult Situation</p>
                <h3 class="card-title">{{$difficult}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{route('admin.difficult.index')}}">Get More</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@extends('admin.layouts.base')
@section('title', 'Post Detail')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Detail Post</h4>
                <!-- <p class="card-category">Complete your profile</p> -->
            </div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Creator</label>
                                <p>{{$post->user->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Title</label>
                                <p>{{$post->name}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Content</label>
                                <p>{!! $post->content !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Category</label>
                                <p>{$post->category->name }</p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile pt-5 px-5 pb-3">
            <a href="javascript:void(0);">
                <img class="w-100"  src="{{asset($post->image ?? 'images/no-img.jpg')}}" />
            </a>
            <h4 class="pt-3 mb-0">Image</h4>
        </div>
    </div>
</div>

@endsection
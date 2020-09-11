@extends('admin.layouts.base')
@section('title', 'Detail Campaign')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Detail Campaign</h4>
                <!-- <p class="card-category">Complete your profile</p> -->
            </div>
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Creator</label>
                                <p>{{$campaign->user->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Difficult Situation</label>
                                <p>{{ !empty($campaign->difficult_situation) ? $campaign->difficult_situation->name : ""}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Title</label>
                                <p>{{$campaign->name}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Content</label>
                                <p>{{$campaign->content}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Short content</label>
                                <p>{{$campaign->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Category</label>
                                <p>{{ $campaign->category->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Price total</label>
                                <p>{{$campaign->price_total}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Amount</label>
                                <p>{{$campaign->amount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Expired</label>
                                <p>{{ $campaign->date_end }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Bank account</label>
                                <p>{{$campaign->bank_account}}</p>
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
                <img class="w-100"  src="{{asset($campaign->images ?? 'images/no-img.jpg')}}" />
            </a>
            <h4 class="pt-3 mb-0">Avatar</h4>
        </div>
    </div>
</div>

@endsection
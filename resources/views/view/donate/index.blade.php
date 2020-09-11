@extends('view.layouts.base')

@section('content')
<main class="py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <article class="card campaign-style2 mb-4">
                    <div class="embed-responsive embed-responsive-16by9">
                    <a href="{{route('view.campaign.detail', $campaign->id)}}">
                        <img class="embed-responsive-item"
                            src="{{asset($campaign->images ?? 'images/no-img.jpg')}}">
                            </a>
                    </div>
                    <div class="card-body pb-3  d-flex flex-column align-items-start">
                        <div class="campaign-main-info mb-auto w-100">
                            <div class="campaign-badge-box d-flex justify-content-between align-items-center">
                                <img width="50" height="50" class="mr-2 avatar bg-white img-fill"
                                    src="{{asset($campaign->user->avatar ?? 'images/user.png')}}"
                                    alt="avatar user">
                            </div>
                            <a href="{{route('view.campaign.detail', $campaign->id)}}">
                                <h6 class="card-title mt-3 mb-2 text-body ">{{strtoupper($campaign->name)}}</h6>
                            </a>
                            <div class="card-text text-secondary">
                                {!! strip_tags($campaign->content) !!}
                            </div>
                            <div class="card-text card-author mt-1">
                                <span class="text-secondary">bởi</span>
                                <a href="javascript:void(0)" class="campaign-author-link">{{$campaign->user->name}}</a>
                            </div>
                        </div>
                        <?php $perCent = (float)($campaign->price_total / $campaign->amount) *100 ?>
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top w-100">
                            <div class="process-style d-flex justify-content-between align-items-center">
                                <div class="circlechart" data-percentage="{{(int)$perCent}}">
                                    {{ number_format($perCent,2,'.',"") }}%
                                </div>
                            </div>
                            <div class="campaign-info text-right">
                                <div class="campaign-money">
                                    <span>{{number_format($campaign->amount)}}đ</span>
                                </div>
                                <div class="campaign-deadline">
                                    <span class="small text-secondary">
                                        Hết hạn vào {{Date('d/m/Y',strtotime($campaign->date_end))}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <div class="card card-shadow p-3 p-md-4">
                            <h2 class="mb-4">Ủng hộ chiến dịch</h2>
                            <form action="{{route('view.donate.store', $campaign->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                                <section class="donate-form mt-4">
                                    <div class="form-group">
                                        <label for="money">Số tiền</label>
                                        <div class="input-group input-group-lg">
                                            <input type="number" min="0" name="price" value="100000" id="money"
                                                class="form-control font-weight-bold" required="true">
                                            <div class="input-group-append">
                                                <span class="input-group-text  font-weight-bold">VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Lời nhắn của bạn</label> <textarea id="message"
                                            class="form-control" rows="3" maxlength="1000" name="message"
                                            cols="50"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name">Họ tên *</label> <input id="name" required=""
                                                    class="form-control" maxlength="255" name="name" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Điện thoại *</label> <input id="phone" min="0" required=""
                                                    class="form-control" maxlength="255" name="phone" type="number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email *</label> <input id="email" required=""
                                                    class="form-control" maxlength="255" name="email" type="email">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                               
                                <div class="mt-4 d-flex justify-content-between">
                                    <a href="{{ url()->previous() }}"
                                        class="btn btn-default btn-lg">Quay lại</a>
                                    <button type="submit" class="btn btn-danger btn-lg">Ủng hộ chiến dịch</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
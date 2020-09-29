@extends('view.layouts.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/explore.css') }}">
@endsection

@section('content')
    <main class="main explore">
        <section class="my-2 pb-4 container">
            <h2 class="mb-4">Khám phá chiến dịch</h2>
            <div class="mt-2 mb-4">
                <form method="GET" action="{{route('view.explore')}}" accept-charset="UTF-8" id="search-form">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="name" class="form-control" value="{{request('search')}}" placeholder="Nhập từ khóa" name="search" type="text">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if(!empty($data) && count($data))
                <div class="row list-campaigns">
                @foreach($data as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <article class="card campaign-style2 mb-4">
                            <div class="embed-responsive embed-responsive-16by9">
                            <a href="{{route('view.campaign.detail', $item->id)}}">
                                <img class="embed-responsive-item"
                                    src="{{asset($item->images ?? 'images/no-img.jpg')}}">
                                    </a>
                            </div>
                            <div class="card-body pb-3  d-flex flex-column align-items-start">
                                <div class="campaign-main-info mb-auto w-100">
                                    <div class="campaign-badge-box d-flex justify-content-between align-items-center">
                                        <img width="50" height="50" class="mr-2 avatar bg-white img-fill"
                                            src="{{asset($item->user->avatar ?? 'images/user.png')}}"
                                            alt="avatar user">
                                    </div>
                                    <a href="{{route('view.campaign.detail', $item->id)}}">
                                        <h6 class="card-title mt-3 mb-2 text-body ">{{strtoupper($item->name)}}</h6>
                                    </a>
                                    <div class="card-text text-secondary">
                                        {!! strip_tags($item->content) !!}
                                    </div>
                                    <div class="card-text card-author mt-1">
                                        <span class="text-secondary">bởi</span>
                                        <a href="javascript:void(0)" class="campaign-author-link">{{$item->user->name}}</a>
                                    </div>
                                </div>
                                <?php $perCent = (float)($item->price_total / $item->amount) *100 ?>
                                <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top w-100">
                                    <div class="process-style d-flex justify-content-between align-items-center">
                                        <div class="circlechart" data-percentage="{{(int)$perCent}}">
                                            {{ number_format($perCent,2,'.',"") }}%
                                        </div>
                                    </div>
                                    <div class="campaign-info text-right">
                                        <div class="campaign-money">
                                            <span>{{number_format($item->amount)}}đ</span>
                                        </div>
                                        <div class="campaign-deadline">
                                            <span class="small text-secondary">
                                                Hết hạn vào {{Date('d/m/Y',strtotime($item->date_end))}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
                </div>
                <div class="my-3">
                    {{$data->links()}}
                </div>
            @endif
        </section>
        <section id="introduce" class="py-5 bg-light">
            <div class="container">
                <div class="bottom-introduce mt-4 row">
                    <div class="text-center py-2 col-md-8 offset-md-2">
                        <h2 class="mb-5">Mọi cá nhân, tổ chức đều có thể tự tạo một trang web gây quỹ với Kindmate</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="my-2">
                                    <img src="{{asset('images/quyen-gop.svg')}}" alt="quyen-gop" class="mb-4">
                                    <h4 class="my-2">Tôi muốn quyên góp</h4>
                                    <p class="my-2">
                                        Khởi tạo chiến dịch của bạn ngay lập tức, chỉ với vài thao tác đơn giản và dễ dàng
                                    </p>
                                    <a href="{{route('view.campaign.create')}}"
                                        class="btn btn-lg btn-primary mt-3">Tạo chiến dịch</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="my-2">
                                    <img src="{{asset('images/yeu-thuong.svg')}}" alt="yeu-thuong" class="mb-4">
                                    <h4 class="my-2">Tôi muốn ủng hộ</h4>
                                    <p class="my-2">Hàng trăm chiến dịch đang cần sự trợ giúp của bạn, hãy cùng chúng tôi
                                        khám phá nhé</p>
                                    <a href="{{route('view.explore')}}" class="btn btn-lg btn-danger mt-3">Các chiến
                                        dịch</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.change-tab-to-creator').click(function() {
                $('main.main.detail .nav-link').removeClass('active');
                $('.creator-main').addClass('active');
                $('.tab-content .tab-pane').removeClass('active').addClass('fade');
                $('#creator').addClass('active').removeClass('fade');
            });
        });

    </script>
@endsection

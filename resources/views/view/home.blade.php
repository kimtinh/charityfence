@extends('view.layouts.base')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<main class="main">
    <section id="top-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-flex">
                    <div class="align-self-center">
                        <h1>
                            Minh bạch quyên góp <br> Dễ dàng ủng hộ
                        </h1>
                        <p class="text-secondary my-4 pr-4 text-intro">
                            Charityfence là một nền tảng gây quỹ cộng đồng - nơi mọi cá nhân, tổ chức đều có thể tự tạo
                            một
                            trang web gây quỹ nhanh chóng và chuyên nghiệp...
                            <a href="about.html">Tìm hiểu</a>
                        </p>
                        <div class="take-action-buttons mb-3">
                            <a href="{{ route('view.campaign.create') }}" class="btn btn-danger btn-lg">Tạo
                                chiến
                                dịch</a>
                            <a href="{{ route('view.explore') }}" class="btn btn-primary btn-lg">Các chiến dịch</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <article class="embed-responsive embed-responsive-16by9">
                        <img class="embed-responsive-item rounded" src="{{asset('images/thumb.png')}}">
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section id="category" class="py-5">
        <div class="container">
            <ul class="list-unstyled d-flex justify-content-between list-categories">
                <li>
                    <a href="#" class="btn btn-default btn-lg">
                        <img src="{{asset('images/tu-thien.svg')}}" alt="kindmate-icon" class="mr-2" width="28">
                        Từ thiện
                    </a>
                </li>
                <li>
                    <a href="#" class="btn btn-default btn-lg">
                        <img src="{{asset('images/tre-em.svg')}}" alt="kindmate-icon" class="mr-2" width="28">
                        Trẻ em
                    </a>
                </li>
                <li>
                    <a href="#" class="btn btn-default btn-lg">
                        <img src="{{asset('images/hoan-canh.svg')}}" alt="kindmate-icon" class="mr-2" width="28">
                        Khó khăn
                    </a>
                </li>
                <li>
                    <a href="#" class="btn btn-default btn-lg">
                        <img src="{{asset('images/khuyet-tat.svg')}}" alt="kindmate-icon" class="mr-2" width="28">
                        Khuyết tật
                    </a>
                </li>
                <li>
                    <a href="#" class="btn btn-default btn-lg">
                        <img src="{{asset('images/giao-duc.svg')}}" alt="kindmate-icon" class="mr-2" width="28">
                        Giáo dục
                    </a>
                </li>
                <li>
                    <a href="#" class="btn btn-default btn-lg">
                        <img src="{{asset('images/ung-ho.svg')}}" alt="kindmate-icon" class="mr-2" width="28">
                        Khác
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section id="list-campaign" class="pb-5">
        <div class="container">
            @if(!empty($listCampaign) && count($listCampaign))
            <div class="row list-campaigns">
                @foreach($listCampaign as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <article class="card campaign-style2 mb-4">
                        <div class="embed-responsive embed-responsive-16by9">
                            <img class="embed-responsive-item" src="{{asset($item->images ?? 'images/no-img.jpg')}}">
                        </div>
                        <div class="card-body pb-3  d-flex flex-column align-items-start">
                            <div class="campaign-main-info mb-auto w-100">
                                <div class="campaign-badge-box d-flex justify-content-between align-items-center">
                                    <img width="50" height="50" class="mr-2 avatar bg-white img-fill"
                                        src="{{asset($item->user->avatar ?? 'images/user.png')}}"
                                        alt="">
                                </div>
                                <a href="{{route('view.campaign.detail', $item->id)}}">
                                    <h6 class="card-title mt-3 mb-2 text-body ">{{$item->name}}</h6>
                                </a>
                                <div class="card-text text-secondary">{!! strip_tags($item->content) !!}
                                </div>
                                <div class="card-text card-author mt-1">
                                    <span class="text-secondary">bởi</span>
                                    <a href="javascript:void(0)" class="campaign-author-link">{{$item->user->name}}</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top w-100">
                                <div class="process-style d-flex justify-content-between align-items-center">
                                    <?php $perCent = (float)($item->price_total / $item->amount) *100 ?>
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
            @endif
            <div class="text-center mt-3">
                <a href="{{route('view.explore')}}" class="btn btn-danger btn-lg">Xem tất cả chiến dịch</a>
            </div>
        </div>
    </section>

    @if(!empty($campaignsTop3) && count($campaignsTop3))
    <section id="success-campaign" class="mb-5">
        <div class="container  border-top mt-4 pt-5">
            <h5 class="section-title mb-4">Chiến dịch thành công</h5>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for($i = 0; $i < count($campaignsTop3); $i++) <li data-target="#carouselExampleIndicators"
                        data-slide-to="{{$i}}" class="{{$i==0?'active':''}}">
                        </li>
                        @endfor
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item campaign-style3 active">
                        @foreach($campaignsTop3 as $item)
                        <div class="row">
                            <div class="col-md-7">
                                <div class="embed-responsive embed-responsive-16by9 campaign-style1 mb-3 mb-md-0">
                                    <img class="embed-responsive-item"
                                        src="{{asset($item->images ?? 'images/no-img.jpg')}}" alt="{{$item->name}}">
                                </div>
                            </div>
                            <div class="col-md-5 d-flex flex-column align-items-start">
                                <div class="w-100">
                                    <a href="detail.html">
                                        <h2 class="campaign-title text-dark">{{$item->name}}</h2>
                                    </a>
                                    <div class="text-secondary my-3">{{  substr(strip_tags($item->content),0,500) }}
                                    </div>

                                    <div class="campagin-progress">
                                        <?php $perCent = (float)($item->price_total / $item->amount) *100 ?>
                                        <div class="d-flex justify-content-between align-items-end">
                                            <h4 class="text-primary mb-0 h3">{{number_format($item->price_total)}}
                                                đ <small>({{(int)$perCent}}%)</small></h4>
                                            <span>{{number_format($item->amount)}} đ</span>
                                        </div>
                                        <div class="progress my-2">
                                            <div class="progress-bar" style="width: {{(int)$perCent}}%"
                                                role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end">
                                            <div class="user-count">
                                                <strong>{{count($item->donate)}}</strong> người
                                                ủng hộ
                                            </div>
                                            <div class="user-count">
                                                <span class="small text-secondary">
                                                    Hết hạn vào {{Date('d/m/Y', strtotime($item->date_end))}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-auto w-100">
                                    <div class="small text-secondary mb-1">
                                        ĐƠN VỊ TỔ CHỨC
                                    </div>
                                    <div class="media align-items-center">
                                        <img width="50" class="mr-2 avatar "
                                            src="{{asset($item->user->avatar ?? 'images/user.png')}}" alt="avatar user">
                                        <div class="media-body">
                                            <p class="dotdotdot mb-0">{{$item->user->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    @endif


    <section id="introduce" class="py-5 bg-light">
        <div class="container">
            <div class="top-introduce py-5">
                <div class="row">
                    <div class="col-md-5 order-2 order-md-1 d-flex align-items-center">
                        <article class="introduce-box">
                            <h2>Charityfence là một nền tảng gây quỹ cộng đồng</h2>
                            <p class="my-3 text-secondary">
                                Được Charityfence tập trung vào việc sử dụng công nghệ để giảm bớt
                                rào cản và kết
                                nối các nguồn lực cộng đồng, giúp cho việc gây quỹ trở nên đơn giản, hiệu quả và minh
                                bạch.
                            </p>
                            <div class="d-flex justify-content-between">
                                <div class="count-box">
                                    <h4 class="text-primary">300+</h4>
                                    <div class="text-secondary">
                                        Chiến dịch
                                    </div>
                                </div>
                                <div class="count-box px-3">
                                    <h4 class="text-primary">6,000 +</h4>
                                    <div class="text-secondary">
                                        Người tham gia
                                    </div>
                                </div>
                                <div class="count-box">
                                    <h4 class="text-primary">5,5 tỷ</h4>
                                    <div class="text-secondary">
                                        Tiền quyên góp được
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('view.about')}}" class="btn btn-lg btn-primary mt-5">
                                Tìm hiểu thêm
                            </a>
                        </article>
                    </div>
                    <div class="col-md-6 offset-sm-1 order-1 order-md-2 ">
                        <img width="100%" class="my-3" src="https://kindmate.net/svg/donation.svg" alt="">
                    </div>
                </div>
            </div>

            <div class="middle-introduce py-5">
                <div class="row">
                </div>
            </div>


            <div class="bottom-introduce mt-4 row">
                <div class="text-center py-2 col-md-8 offset-md-2">
                    <h2 class="mb-5">Mọi cá nhân, tổ chức đều có thể tự tạo một trang web gây quỹ với Charityfence</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="my-2">
                                <img src="https://kindmate.net/svg/quyen-gop.svg" alt="quyen-gop" class="mb-4">
                                <h4 class="my-2">Tôi muốn quyên góp</h4>
                                <p class="my-2">
                                    Khởi tạo chiến dịch của bạn ngay lập tức, chỉ với vài thao tác đơn giản và dễ dàng
                                </p>
                                <a href="{{ route('view.campaign.create') }}" class="btn btn-lg btn-primary mt-3">Tạo
                                    chiến dịch</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="my-2">
                                <img src="https://kindmate.net/svg/yeu-thuong.svg" alt="yeu-thuong" class="mb-4">
                                <h4 class="my-2">Tôi muốn ủng hộ</h4>
                                <p class="my-2">Hàng trăm chiến dịch đang cần sự trợ giúp của bạn, hãy cùng chúng tôi
                                    khám phá nhé</p>
                                <a href="{{ route('view.explore') }}" class="btn btn-lg btn-danger mt-3">Các chiến
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
$('.carousel').carousel()
@endsection
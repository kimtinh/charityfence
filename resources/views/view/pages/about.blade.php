@extends('view.layouts.base')

@section('css')
<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection

@section('content')
<main class="main">
    <section id="top-video" class="bg-black" style="margin-top: -3rem;">
        <div class="container">
            <div style="padding-top: 56.25%; position: relative; overflow: hidden;"><iframe frameborder="0"
                    allowfullscreen=""
                    src="https://onelineplayer.com/player.html?autoplay=false&amp;loop=true&amp;autopause=false&amp;muted=false&amp;url=http%3A%2F%2Fkindmate.net%2Fvideos%2FSequence19.mp4&amp;poster=https%3A%2F%2Fkindmate.net%2Fimages%2Fthumb.png&amp;time=true&amp;progressBar=true&amp;playButton=true&amp;overlay=true&amp;muteButton=true&amp;fullscreenButton=true&amp;style=dark&amp;logo=false&amp;quality=1080p"
                    style="position: absolute; height: 100%; width: 100%; left: 0px; top: 0px;"></iframe></div>
        </div>
    </section>
    <section id="introduce" class="py-5 bg-light">
        <div class="container">
            <div class="top-introduce py-5">
                <div class="row">
                    <div class="col-md-5 order-2 order-md-1 d-flex align-items-center">
                        <article class="introduce-box">
                            <h2>Kindmate là một nền tảng gây quỹ cộng đồng</h2>
                            <p class="my-3 text-secondary">
                                Được phát triển bởi Wakeitup, Kindmate tập trung vào việc sử dụng công nghệ để giảm
                                bớt rào cản và kết nối các nguồn lực cộng đồng, giúp cho việc gây quỹ trở nên đơn
                                giản, hiệu quả và minh bạch.
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
                            <a href="about.html" class="btn btn-lg btn-primary mt-5">
                                Tìm hiểu thêm
                            </a>
                        </article>
                    </div>
                    <div class="col-md-6 offset-sm-1 order-1 order-md-2 ">
                        <img width="100%" class="my-3"  src="{{asset('images/donation.svg')}}" >
                    </div>
                </div>
            </div>

            <div class="middle-introduce py-5">
                <div class="row">
                </div>
            </div>


            <div class="bottom-introduce mt-4 row">
                <div class="text-center py-2 col-md-8 offset-md-2">
                    <h2 class="mb-5">Mọi cá nhân, tổ chức đều có thể tự tạo một trang web gây quỹ với Kindmate</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="my-2">
                                <img src="{{asset('images/quyen-gop.svg')}}" alt="quyen-gop" class="mb-4">
                                <h4 class="my-2">Tôi muốn quyên góp</h4>
                                <p class="my-2">
                                    Khởi tạo chiến dịch của bạn ngay lập tức, chỉ với vài thao tác đơn giản và dễ
                                    dàng
                                </p>
                                <a href="create.html" class="btn btn-lg btn-primary mt-3">Tạo chiến dịch</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="my-2">
                                <img src="{{asset('images/yeu-thuong.svg')}}" alt="yeu-thuong" class="mb-4">
                                <h4 class="my-2">Tôi muốn ủng hộ</h4>
                                <p class="my-2">Hàng trăm chiến dịch đang cần sự trợ giúp của bạn, hãy cùng chúng
                                    tôi khám phá nhé</p>
                                <a href="explore.html" class="btn btn-lg btn-danger mt-3">Các chiến dịch</a>
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

@endsection
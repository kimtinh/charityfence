@extends('view.layouts.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <style>
        .tab-content div#content .campaign-content .content-campaign {
            height: 100% !important;
            overflow: auto;
        }

    </style>
@endsection

@section('content')
    <main class="main detail">
        <div class="container">
            <section id="campaign-top-header">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="media">
                            <div class="media-body">
                                <h1 class="mt-0 font-weight-normal">{{$post->name}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr class="hr-top">

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="content" class="container tab-pane active"><br>
                    <article>
                        <div class="row">
                            <div class="col-lg-12">
                                @if($post->image)
                                <div class="embed-responsive embed-responsive-16by9 campaign-style1 no-shadow mb-3 mb-md-0">
                                    <img class="embed-responsive-item"
                                        src="{{asset($post->image)}}"> 
                                </div>
                                @endif
                                <div class="row {{$post->image ? 'mt-3' : '' }}">
                                    <div class="campaign-content">
                                        <div id="campaign-content">
                                            <article class="fck_detail">
                                                {!! $post->content !!}
                                            </article>
                                        </div>

                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </article>

                </div>

                <div id="comments" class="container tab-pane fade">
                    <article class="campaign-style3">
                        <div class="row">
                            <div class="col-lg-8">

                                <div class="donate-content pt-4" id="comments">
                                    <h3 class="mb-3">Bình luận</h3>
                                    <div class="k-comments">
                                        <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop"
                                            data-href="https://kindmate.net/project/1404/trai-he-giao-duc-be-khoe-be-ngoan"
                                            data-numposts="10" data-width="100%" fb-xfbml-state="rendered"
                                            fb-iframe-plugin-query="app_id=1407210996040164&amp;container_width=770&amp;height=100&amp;href=https%3A%2F%2Fkindmate.net%2Fproject%2F1404%2Ftrai-he-giao-duc-be-khoe-be-ngoan&amp;locale=en_US&amp;numposts=10&amp;sdk=joey&amp;version=v2.8&amp;width="
                                            style="width: 100%;"><span
                                                style="vertical-align: bottom; width: 100%; height: 178px;"><iframe
                                                    name="f1dc8f8a193a234" width="1000px" height="100px"
                                                    data-testid="fb:comments Facebook Social Plugin"
                                                    title="fb:comments Facebook Social Plugin" frameborder="0"
                                                    allowtransparency="true" allowfullscreen="true" scrolling="no"
                                                    allow="encrypted-media"
                                                    src="https://www.facebook.com/v2.8/plugins/comments.php?app_id=1407210996040164&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fx%2Fconnect%2Fxd_arbiter%2F%3Fversion%3D46%23cb%3Df22f33424003434%26domain%3Dkindmate.net%26origin%3Dhttps%253A%252F%252Fkindmate.net%252Ff3bc6a73dffe75c%26relation%3Dparent.parent&amp;container_width=770&amp;height=100&amp;href=https%3A%2F%2Fkindmate.net%2Fproject%2F1404%2Ftrai-he-giao-duc-be-khoe-be-ngoan&amp;locale=en_US&amp;numposts=10&amp;sdk=joey&amp;version=v2.8&amp;width="
                                                    style="border: none; visibility: visible; width: 100%; height: 178px;"
                                                    class=""></iframe></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class=" d-flex flex-column align-items-start  bg-light p-3">
                                    <div class=" d-flex flex-column align-items-start  bg-light p-3 h-100">
                                        <div class="w-100">
                                            <div class="campagin-progress">
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <h4 class="text-primary mb-0 h3">20,000 đ
                                                        <small>(0%)</small></h4>
                                                    <span>5 tr đ</span>
                                                </div>
                                                <div class="progress my-2">
                                                    <div class="progress-bar" style="width: 0%" role="progressbar"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-end">
                                                    <div class="user-count">
                                                        <strong>1</strong> người ủng hộ
                                                    </div>
                                                    <div class="user-count">
                                                        Hết hạn vào 11/08/2020
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-4">
                                                <a href="https://kindmate.net/donate/1404"
                                                    class="btn btn-danger btn-lg btn-block">Ủng hộ ngay</a>
                                                <div class="divider"></div>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https://kindmate.net/project/1404/trai-he-giao-duc-be-khoe-be-ngoan"
                                                    class="btn btn-default btn-lg bg-white btn-block mt-3">Chia sẻ
                                                    ngay</a>

                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="small">
                                                <div class="hints">Tips: Bạn có biết, mỗi lượt chia sẻ của bạn có thể
                                                    mang lại 2 lượt ủng hộ từ bạn bè.</div>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https://kindmate.net/project/1404/trai-he-giao-duc-be-khoe-be-ngoan"
                                                    class="text-info mt-1">
                                                    <i class="zmdi zmdi-facebook mr-1"></i> Chia sẻ ngay
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mt-auto w-100">
                                            <div class="small text-secondary mb-1">
                                                ĐƠN VỊ TỔ CHỨC
                                            </div>
                                            <div class="media align-items-center">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mt-auto w-100">
                                            <div class="small text-secondary mb-1">
                                                CHỦ CHIẾN DỊCH
                                            </div>
                                            <div class="media align-items-center">
                                                <img width="50" class="mr-2 avatar "
                                                    src="https://kindmate.net/images/user-avatar.png"
                                                    alt="CLB tình nguyện Bé Khỏe Bé Ngoan">
                                                <div class="media-body">
                                                    <p class="dotdotdot mb-0">CLB tình nguyện Bé Khỏe Bé Ngoan</p>
                                                    <div class="campaign-summary">
                                                        <a data-toggle="pill" href="#creator"
                                                            class="small change-tab-to-creator">Xem thông tin</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>

    </script>
@endsection

@extends('view.layouts.base')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
<main class="main detail">
    <div class="container">
        <section id="campaign-top-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="media">
                        <div class="media-body">
                            <h1 class="mt-0 font-weight-normal">{{$data->name}}</h1>
                            <p class="mb-1 text-secondary">{{$data->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <ul class="nav nav-pills mt-4" role="tablist">
            <li class="nav-item">
                <a class=" nav-link active" data-toggle="pill" href="#content">Nội dung</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#lists">Danh sách ủng hộ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#comments">Bình luận</a>
            </li>
        </ul>
        <hr class="hr-top">

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="content" class="container tab-pane active"><br>
                <article>
                    <div class="row">
                        <div class="col-lg-8">
                           
                            <div class="embed-responsive embed-responsive-16by9 campaign-style1 no-shadow mb-3 mb-md-0">
                                @if($data->video)
                                    {!! $data->video !!}
                                @elseif($data->images)
                                    <img class="embed-responsive-item" src="{{asset($data->images)}}">
                                @else
                                    <img class="embed-responsive-item" src="{{asset('images/no-img.jpg')}}">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class=" d-flex flex-column align-items-start  bg-light p-3 h-100">
                                <div class="w-100">
                                    <div class="campagin-progress">
                                        <div class="d-flex justify-content-between align-items-end">
                                            <?php $perCent = ($data->price_total / $data->amount) *100 ?>
                                            <h4 class="text-primary mb-0 h3">{{number_format($data->price_total)}} đ
                                                <small>({{ number_format($perCent,2,'.',"") }}%)</small></h4>
                                            <span>{{number_format($data->amount)}} đ</span>
                                        </div>
                                        <div class="progress my-2">
                                            <div class="progress-bar" style="width: {{$perCent}}%" role="progressbar"
                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-end">
                                            <div class="user-count">
                                                <strong>{{ count($data->donate) }}</strong> người ủng hộ
                                            </div>
                                            <div class="user-count">
                                                {{ (new Carbon\Carbon($data->date_end))->diffForHumans()}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <a href="{{ route('view.donate', $data->id) }}"
                                            class="btn btn-danger btn-lg btn-block">Ủng hộ ngay</a>
                                        <div class="divider"></div>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"
                                          target="_blank"  class="btn btn-default btn-lg bg-white btn-block mt-3 border">Chia sẻ ngay</a>

                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="small">
                                        <div class="hints">Tips: Bạn có biết, mỗi lượt chia sẻ của bạn có thể mang lại 2 lượt ủng hộ từ bạn bè.</div>
                                    </div>
                                </div>
                                <hr>
                                <div class="mt-auto w-100">
                                    <div class="small text-secondary mb-1">
                                        CHỦ CHIẾN DỊCH
                                    </div>
                                    <div class="media align-items-center">
                                        <img width="50" class="mr-2 avatar "
                                            src="{{ asset($data->user->avatar ?? 'images/user.png') }}"
                                            alt="The Kapusta">
                                        <div class="media-body">
                                            <p class="dotdotdot mb-0">{{$data->user->name}}</p>
                                            <div class="campaign-summary">
                                            <a href="{{route('view.profile',$data->user_id)}}"
                                                        class="small">Xem thông tin</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <div class="row mt-4">
                    <div class="col-lg-8">
                        <div class="campaign-content mt-2 pt-1 border-top">
                            <div id="campaign-content">
                                <h3 class="my-3 font-weight-bold h3">Nội dung chiến dịch</h3>
                                <div class="content-campaign">
                                    {!! $data->content !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="lists" class="container tab-pane fade"><br>
                <div class="row mt-4">
                    <div class="col-lg-8">
                        <div class="donate-content mt-4">
                            <h3 class="mb-3">{{ count($data->donate) }} người ủng hộ</h3>
                            @if(!empty($data->donate) && count($data->donate))
                            <div class="my-3">
                                <table class="table table-block">
                                    <tbody>
                                        @foreach($data->donate as $donate)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <img src="https://kindmate.net/svg/transfer.svg"
                                                        alt="icon payment">
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-1">{{$donate->name}}</h6>
                                                        <p class="mb-1">{{$donate->message}}</p>
                                                        <p class="small text-secondary mb-0">
                                                            Donate {{ (new Carbon\Carbon($donate->created_at))->diffForHumans()}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-right ">
                                                <strong class="text-primary white-space">{{number_format($donate->price)}} VNĐ</strong>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class=" d-flex flex-column align-items-start  bg-light p-3 h-100">
                            <div class="w-100">
                                <div class="campagin-progress">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <h4 class="text-primary mb-0 h3">{{number_format($data->price_total)}} đ
                                            <small>({{ number_format($perCent,2,'.',"") }}%)</small></h4>
                                        <span>{{number_format($data->amount)}} đ</span>
                                    </div>
                                    <div class="progress my-2">
                                        <div class="progress-bar" style="width: {{$perCent}}%" role="progressbar"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div class="user-count">
                                            <strong>{{ count($data->donate) }}</strong> người ủng hộ
                                        </div>
                                        <div class="user-count">
                                         {{ (new Carbon\Carbon($data->date_end))->diffForHumans()}}
                                        </div>
                                    </div>
                                </div>
                                <div class="my-4">
                                    <a href="{{ route('view.donate', $data->id) }}"
                                        class="btn btn-danger btn-lg btn-block">Ủng hộ ngay</a>
                                    <div class="divider"></div>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"
                                        class="btn btn-default btn-lg bg-white btn-block mt-3">Chia sẻ ngay</a>

                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="small">
                                    <div class="hints">Tips: Bạn có biết, mỗi lượt chia sẻ của bạn có thể mang
                                        lại 2
                                        lượt ủng hộ từ bạn bè.</div>
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
                                        src="{{ asset($data->user->avatar ?? 'images/user.png') }}"
                                        alt="The Kapusta">
                                    <div class="media-body">
                                        <p class="dotdotdot mb-0">{{$data->user->name}}</p>
                                        <div class="campaign-summary">
                                            <a href="{{route('view.profile',$data->user_id)}}"
                                                        class="small">Xem thông tin</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="comments" class="container tab-pane fade">
                <article class="campaign-style3">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="donate-content pt-4" id="comments">
                                <h3 class="mb-3">Bình luận</h3>
                                @if(!empty($data->comment) && count($data->comment))
                                    @foreach($data->comment as $cmt) 
                                    <div class="form-comment mb-3">
                                        <a href="{{route('view.profile', $cmt->user->id)}}" class="mb-0 d-flex align-items-center font-weight-bold text-primary"> <img src="{{asset($cmt->user->avatar ?? 'images/user.png')}}" class="avt-cmt mr-1" alt="avatar"> {{$cmt->user->name}}</a>
                                        <p class="mb-0 ml-4 pre-line">{{$cmt->content}}</p>
                                        <i class="text-sm ml-4">Lúc: {{Date('d/m/Y H:i:s', strtotime($cmt->created_at))}}</i>
                                    </div>
                                    @endforeach
                                @endif

                                <form class="k-comments" action="{{route('view.campaign.comment', $data->id)}}" method="post"> 
                                    @csrf
                                   <textarea name="comment" class="form-control" id="" rows="3"></textarea>
                                   <div class="text-right mt-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Gửi</button>
                                   </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class=" d-flex flex-column align-items-start  bg-light p-3">
                                <div class=" d-flex flex-column align-items-start  bg-light p-3 h-100">
                                    <div class="w-100">
                                        <div class="campagin-progress">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <h4 class="text-primary mb-0 h3">{{number_format($data->price_total)}} đ
                                                    <small>({{ number_format($perCent,2,'.',"") }}%)</small></h4>
                                                <span>{{number_format($data->amount)}} đ</span>
                                            </div>
                                            <div class="progress my-2">
                                                <div class="progress-bar" style="width: {{$perCent}}%" role="progressbar"
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
                                            <a href="{{ route('view.donate', $data->id) }}"
                                                class="btn btn-danger btn-lg btn-block">Ủng hộ ngay</a>
                                            <div class="divider"></div>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"
                                                class="btn btn-default btn-lg bg-white btn-block mt-3">Chia sẻ
                                                ngay</a>

                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="small">
                                            <div class="hints">Tips: Bạn có biết, mỗi lượt chia sẻ của bạn có thể
                                                mang lại 2 lượt ủng hộ từ bạn bè.</div>
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
                                                src="{{ asset($data->user->avatar ?? 'images/user.png') }}"
                                                alt="The Kapusta">
                                            <div class="media-body">
                                                <p class="dotdotdot mb-0">{{$data->user->name}}</p>
                                                <div class="campaign-summary">
                                                    <a href="{{route('view.profile',$data->user_id)}}"
                                                        class="small">Xem thông tin</a>
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
    $(function(){
        $('.change-tab-to-creator').click(function () {
            $('main.main.detail .nav-link').removeClass('active');
            $('.creator-main').addClass('active');
            $('.tab-content .tab-pane').removeClass('active').addClass('fade');
            $('#creator').addClass('active').removeClass('fade');
        });
    });
</script>
@endsection
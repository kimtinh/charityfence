@extends('view.layouts.base')
@section('css')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection
@section('content')
<main class="main mt-5">
    <section class="my-2 container">
        <div class="row">
            <div class="col-md-3">
                <nav class="nav-profile">
                    <ul class="list-profile">
                        <li class="">
                            <a class="" href="{{route('view.profile',$id)}}">Trang cá nhân</a>
                        </li>
                        <li class="">
                            <a class="" href="{{route('view.profile-campaign',$id)}}">Chiến dịch đã tạo</a>
                        </li>
                        <li class="">
                            <a class="active" href="javascript:void(0)">Tin tức đã tạo</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-9">
                @if(!empty($list) && count($list) > 0)
                <ul class="px-0 ">
                    @foreach($list as $item)
                    <li class="post-item d-flex align-items-center border mb-4 p-3">
                        <div class="post-avt w-25">
                            <a href="{{route('view.articles.detail', $item->id)}}">
                                <img src="{{asset($item->image)}}" class="w-100" alt="image">
                            </a>
                        </div>
                        <div class="post-content w-75 ml-3">
                            <div class="post-title">
                                <a href="{{route('view.articles.detail', $item->id)}}" class="h6 text-primary">
                                    {{$item->name}}
                                </a>
                            </div>
                            <div class="post-des">
                                <p>{{strip_tags($item->content)}}</p>
                            </div>
                            @if(Auth()->user())
                            <div class="dropdown text-right">
                                <a href="javascript:void(0)" class="dropdown-toggle text-success text-sm" data-toggle="dropdown">
                                    Chi tiết
                                </a>
                                <div class="dropdown-menu text-center min-w-0">
                                    <a class="dropdown-item px-2" href="{{route('view.articles.detail', $item->id)}}">Xem</a>
                                    <a class="dropdown-item" href="{{route('view.articles.edit', $item->id)}}">Sửa</a>
                                    <a class="dropdown-item del-item" href="javascript:void(0);" data-form="#form-{{$item->id}}">Xóa</a>
                                    <form action="{{route('view.delete-articles', $item->id)}}" id="form-{{$item->id}}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                            @else
                            <div class="post-link text-right">
                                <a class="small" href="{{route('view.articles.detail', $item->id)}}"><small>Xem thêm</small></a>
                            </div>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
                {{$list->links()}}
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script>
    $(function(){
        @if(auth()->user())
        $('.del-item').on('click',function(){
            Swal.fire({
                title: 'Do you want delete campaign?',
                showCancelButton: true,
                reverseButtons: true
            }).then((value)=>{
                if(value.value){
                    let form_id = $(this).attr('data-form');
                    document.querySelector(form_id).submit();
                }
            });
        }); 
        @endif
    }); 
</script>
@endsection
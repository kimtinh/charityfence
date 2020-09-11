@extends('view.layouts.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/createCampaign.css') }}">
@endsection

@section('content')
    <main class="main createCampaign">
        <section class="my-2 container">
            <h1 class="mb-4">Tạo Tin tức</h1>
            <form method="POST" action="{{route('view.articles.update', $post->id)}}" accept-charset="UTF-8" id="campaign-form"
                enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1">
                        <div class="form-group">
                            <h5>Tiêu đề*</h5>
                            <input type="text" name="name" class="form-control" value="{{$post->name}}" placeholder="Tiêu đề" required>
                        </div>
                        <div class="form-group">
                            <h5>Nội dung*</h5>
                            <textarea name="content" id="editor1" required>{!! $post->content !!}</textarea>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-danger" onclick="window.history.back();">Hủy bỏ</button>
                            <div class="publish-wrap">
                                <button type="submit" class="btn btn-primary">Lưu </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 order-1 order-md-2">
                        <div class="embed-responsive embed-responsive-16by9 image-file-com">
                            <div class="close" style="">
                                ×
                            </div>
                            <div class="embed-responsive-item d-flex justify-content-center align-items-center text-center">
                                <label for="campaign-cover">
                                    <i class="fas fa-camera" style="font-size: 30px"></i>
                                    <div>Ảnh đại diện <br></div>
                                </label> <input accept="" hidden="" id="campaign-cover" name="image" type="file">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        $(function() {
            CKEDITOR.replace('editor1');
            @if($post && $post->image)
                $('.image-file-com').css({'background' : "url({{asset($post->image)}}) no-repeat center center", 'background-size':'cover'});
            @endif
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.image-file-com').css({'background' : `url(${e.target.result}) no-repeat center center`, 'background-size':'cover'});
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#campaign-cover").on('change', function(){
                if($(this).val() !== "")
                    readURL(this);
                else{
                    $('.image-file-com').css({'background':'#f3f3f3'});
                    $("#campaign-cover").val('');
                }
            });
           $('.close').on('click',function(){
            $('.image-file-com').css({'background':'#f3f3f3'});
            $("#campaign-cover").val('');
           });
        });
    </script>
@endsection

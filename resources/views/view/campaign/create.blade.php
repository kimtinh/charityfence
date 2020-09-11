@extends('view.layouts.base')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/createCampaign.css') }}">
@endsection

@section('content')
    <main class="main createCampaign">
        <section class="my-2 container">
            <h1 class="mb-4">Tạo chiến dịch mới</h1>
            <form method="POST" action="{{route('view.campaign.store')}}" accept-charset="UTF-8" id="campaign-form"
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
                <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1">
                        <div class="embed-responsive embed-responsive-16by9 image-file-com">
                            <div class="close" style="">
                                ×
                            </div>
                            <div class="embed-responsive-item d-flex justify-content-center align-items-center text-center">
                                <label for="campaign-cover">
                                    <i class="fas fa-camera" style="font-size: 30px"></i>
                                    <div>Ảnh đại diện <br>850 x 480 pixel</div>
                                </label> <input accept="image/*" hidden="" id="campaign-cover" name="images" type="file">
                            </div>
                        </div>

                        <div class="form-group mt-3 mb-5">
                            <label for="campaign-embed">Mã nhúng video (không bắt buộc)</label> <textarea
                                id="campaign-description" class="form-control"
                                placeholder="Hỗ trợ mã nhúng có dạng <iframe src='https://www.youtube.com/embed/8Qr9WW2bLAQ' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>"
                                rows="3" maxlength="1000" name="video" cols="50">{{old('video')}}</textarea>
                            <small id="campaign-embed-help" class="form-text text-muted"><span
                                    class="text-primary font-weight-bold">Tips:</span> Để thực hiện việc lấy mã nhúng bạo
                                vào video Youtube bạn chọn &gt; chọn Chia sẻ &gt; Embeb &gt; Copy mã Nhúng. Hỗ trợ cả mã
                                nhúng của Facebook, Vimeo... và các trang tương tự.</small>
                        </div>
                        <div class="form-group mt-4">
                            <h5>Nội dung chiến dịch*</h5>
                            <textarea name="content" id="editor1" required>{{old('content')}}</textarea>

                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-danger" onclick="window.history.back();">Hủy bỏ</button>
                            <div class="publish-wrap">
                                <button type="submit" class="btn btn-primary">Lưu chiến dịch</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 order-1 order-md-2">
                        <div class="form-group">
                            <label for="campaign-name">Tên chiến dịch*</label> <input id="campaign-name" required=""
                                class="form-control" placeholder="Tên chiến dịch" value="{{old('name')}}" maxlength="255" name="name" type="text">
                        </div>
                        <div class="form-group">
                            <label for="campaign-description">Mô tả ngắn*</label> <textarea id="campaign-description"
                                required="" class="form-control" placeholder="Mô tả ngắn" rows="3" maxlength="255"
                                name="description" cols="50">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="campaign-money">Số tiền mong muốn*</label>
                            <div class="input-group">
                                <input id="campaign-money" required="" class="form-control" placeholder="Số tiền mong muốn"
                                    maxlength="15" value="{{old('amount')}}" name="amount" type="number">
                                <div class="input-group-append">
                                    <span class="input-group-text">VNĐ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="campaign-deadline">Ngày hết hạn*</label>
                            <div class="input-group single-date">
                                <input id="campaign-deadline" required=""
                                    placeholder="Ngày hết hạn"  class="form-control" maxlength="255" value="{{old('date_end')}}" name="date_end" type="date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="campaign-money">Loại chiến dịch*</label>
                            <div class="input-group">
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Chọn loại chiến dịch --</option>
                                    @foreach($listCate as $item)
                                    <option value="{{$item->id}}" {{old('category_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
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

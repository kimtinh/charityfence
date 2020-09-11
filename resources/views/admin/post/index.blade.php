@extends('admin.layouts.base')
@section('title', 'Post Manager')
@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        @if(!empty($data))
        <h4 class="card-title "><a href="javascript:void(0)" class="btn btn-danger btn-sm del-arr" data-del="{{route('admin.post.delete')}}">Delete</a></h4>
        @else
        <h4 class="card-title ">Post Empty</h4>
        @endif
        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
    </div>
    <div class="card-body">
        @if(!empty($data))
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th></th>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $index=>$item)
                    <tr data-red="{{route('admin.post.show', $item->id)}}">
                        <td>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" name="ids[]" type="checkbox" value="{{$item->id}}">
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </td>
                        <td>{{++$index}}</td>
                        <?php 
                            $content = strip_tags($item->content); 
                            $content = strlen($content) > 40 ? substr($content, 0 , 37).'...' : $content;
                            $title = $item->name;
                            $title = strlen($title) > 40 ? substr($title, 0 , 37).'...' : $title;
                        ?>
                        <td>{{$title}}</td>
                        <td>{{$content}}</td>
                        <td>@if($item->image) <img src="{{asset($item->image)}}" class="img-table" alt="image"> @endif</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$data->links()}}
        <!-- end table-respon -->
        @endif
    </div>
    <!-- end card-body -->
</div>
<!-- end card -->
@endsection
@extends('admin.layouts.base')

@section('content')

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Difficult Situation</h4>
                <!-- <p class="card-category">Complete your profile</p> -->
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.difficult.update', $data->id)}}">
                    @csrf
                    @method('PATCH')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Name</label>
                            <input type="text" name="name" value="{{$data->name}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="">{!! $data->description !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Address</label>
                            <input type="text" name="address" value="{{$data->address}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Phone</label>
                            <input type="number" name="phone" value="{{$data->phone}}" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Update</button>
                <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection
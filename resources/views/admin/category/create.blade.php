@extends('admin.layouts.base')
@section('title', 'Create Category')

@section('content')

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Category</h4>
                <!-- <p class="card-category">Complete your profile</p> -->
            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.category.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Group</label>
                                @if( !empty($group) && count($group) > 0)
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">- - Choose Group - -</option>
                                    @foreach($group as $item)
                                    <option value="{{$item->id}}" {{$item->id == (old('parent_id')??'') ?  'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-info pull-right">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary submit-form pull-right">Create</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function(){
        $('.submit-form').on('click',function(){
            if( !$('#parent_id').val() )
                Swal.fire({
                    title:'Do you want create group category?',
                    reverseButtons: true,
                    showCancelButton: true,
                }).then((value)=>{
                    if(value.value)
                        $('form').submit();
                    else
                        return false;
                });
            else
                $('form').submit();
            return false;
        });
    });
</script>
@endsection
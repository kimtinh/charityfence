@extends('admin.layouts.base')
@section('title', 'Category Manager')
@section('content')
    <div class="card bg-primary p-3">
        @if(!empty($categories))
        <h4 class="card-title ">
            <a href="javascript:void(0)" class="btn btn-danger btn-sm del-arr" data-del="{{route('admin.category.delete')}}">Delete</a> 
            <a href="{{route('admin.category.create')}}" class="btn btn-light btn-sm text-light">Create</a> 
        </h4>
        @else
        <h4 class="card-title ">Category Empty</h4>
        @endif
        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
    </div>
<div class="row">
    <div class="card col-md-4 ml-md-3 mr-md-3">
        <div class="card-header card-header-primary">
            @if(!empty($group) && count($group) > 0)
            <h4 class="card-title text-center">
                Group
            </h4>
            @else
            <h4 class="card-title ">Category Empty</h4>
            @endif
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
        </div>
        <div class="card-body ">
            @if(!empty($group) && count($group) > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Group</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($group as $index=>$item)
                        <tr data-red="{{route('admin.campaign.edit', $item->id)}}">
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="ids" type="checkbox" value="{{$item->id}}">
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td>{{++$index}}</td>
                            <td>{{$item->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$categories->links()}}
            <!-- end table-respon -->
            @endif
        </div>
        <!-- end card-body -->
    </div>
    <!-- end card -->
    <div class="card col-md-7">
        <div class="card-header card-header-primary">
            @if(!empty($categories))
            <h4 class="card-title text-center">
                Category
            </h4>
            @else
            <h4 class="card-title ">Category Empty</h4>
            @endif
            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
        </div>
        <div class="card-body ">
            @if(!empty($categories))
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Group</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $index=>$item)
                        <tr data-red="{{route('admin.campaign.edit', $item->id)}}">
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
                            <td>{{$item->group->name}}</td>
                            <td>{{$item->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$categories->links()}}
            <!-- end table-respon -->
            @endif
        </div>
        <!-- end card-body -->
    </div>
    <!-- end card -->
</div>
@endsection
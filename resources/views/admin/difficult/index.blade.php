@extends('admin.layouts.base')
@section('title', 'Difficult Situation')
@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        @if(!empty($data))
        <h4 class="card-title ">
            <a href="javascript:void(0)" class="btn btn-danger btn-sm del-arr" data-del="{{route('admin.difficult.delete')}}">Delete</a>
            <a href="{{route('admin.difficult.create')}}" class="btn btn-light btn-sm text-light">Create</a> 
        </h4>
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
                    <th>Name</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Phone</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $index=>$item)
                    <tr data-red="{{route('admin.difficult.edit', $item->id)}}">
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
                        <td>{{$item->name}}</td>
                        <?php 
                            $description = strip_tags($item->description); 
                            $description = strlen($description) > 40 ? substr($description, 0 , 37).'...' : $description;
                        ?>
                        <td>{{$description}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->phone}}</td>
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
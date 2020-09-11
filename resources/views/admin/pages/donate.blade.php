@extends('admin.layouts.base')
@section('title', 'Donate Manager')
@section('content')
<div class="card">
    <div class="card-header card-header-primary">
        @if(!empty($data))
        <h4 class="card-title">List Donate</h4>
        @else
        <h4 class="card-title ">Doante Empty</h4>
        @endif
        <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
    </div>
    <div class="card-body">
        @if(!empty($data))
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Campaign</th>
                    <th>Message</th>
                    <th>Price</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $index=>$item)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->campaign->name}}</td>
                        <?php 
                            $message = strip_tags($item->message); 
                            $message = strlen($message) > 40 ? substr($message, 0 , 37).'...' : $message;
                        ?>
                        <td>{{$message}}</td>
                        <td class="font-weight-bold">{{number_format($item->price)}}<sup>đ</sup></td>
                        <td>{{Date('d/m/Y H:i:s', strtotime($item->created_at))}}</td>
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
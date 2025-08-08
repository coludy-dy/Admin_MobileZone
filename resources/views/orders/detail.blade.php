@extends('layouts.app',[
    'active' => 'order'
])
@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('order.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card col-md-8">
            <di class="card-header">
                <h5>Order Detail</h5>
            </di>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="name" class="form-label">Name</label>
                        </div>
                        <div class="col-md-1">
                            <label for="name" class="form-label">:</label>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">{{ $order->user->name}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="brand" class="form-label">Product Name</label>

                        </div>
                        <div class="col-md-1">
                            <label for="name" class="form-label">:</label>
                        </div>
                        <div class="col-md-4">
                            @foreach ($order->orderItems as $item)
                                {{ optional($item->product)->name}}, <br>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="camera">amount</label>
                        </div>
                        <div class="col-md-1">
                            <label for="name" class="form-label">:</label>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">{{ $order->amount}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="color" class="form-label">Status</label>
                        </div>
                        <div class="col-md-1">
                            <label for="name" class="form-label">:</label>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">{{ $order->status}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="price" class="form-label">ordered Date</label>
                        </div>
                        <div class="col-md-1">
                            <label for="name" class="form-label">:</label>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">{{ Carbon\Carbon::parse($order->complete_date)->format('d-m-Y')}}</label>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-md-2">
                            <label for="screen_size">complete Date</label>
                        </div>
                        <div class="col-md-1">
                            <label for="name" class="form-label">:</label>
                        </div>
                        <div class="col-md-4">
                            <label for="name" class="form-label">{{ Carbon\Carbon::parse($order->complete_date)->format('d-m-Y')}}</label>
                        </div>
                    </div>
        </div>
</div>
@endsection
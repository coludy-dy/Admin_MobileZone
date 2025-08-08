@extends('layouts.app',['active'=>'order'])
@section('content')
<div class="container-fluid px-4">
    <h4 class="mb-3">Order</h4>
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white">
            <strong>Search Order</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('order.index')}}" method="GET">
                @csrf
                <div class="row mb-2">
                    <div class="col-md-4">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{request('customer_name')?? ''}}" placeholder="Search by name">
                    </div>

                    <div class="col-md-4">
                        <label for="product_name" class="form-label">Proudct Name </label>
                        <input type="number" class="form-control" name="product_name" id="product_name" value="{{request('product_name')?? ''}}" placeholder="Search by name">
                    </div>

                    <div class="col-md-4">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" value="{{request('quantity')?? ''}}" placeholder="Search by quantity">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control select2">
                            <option value="">Choose Status</option>
                            @foreach ($status as $key => $value)
                            <option value="{{$key}}" {{ request('status') == $key? 'selected' : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="created_at" class="form-label">Created date</label>
                        <input type="date" class="form-control" name="created_at" id="created_at" value="{{request('created_at')?? ''}}">
                    </div>
                    <div class="col-md-4">
                        <label for="complete_date" class="form-label">Complete Date</label>
                        <input type="date" class="form-control" name="complete_date" id="complete_date"value="{{request('complete_date')?? ''}}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-sm btn-primary">Search</button>
                        <a href="{{route('order.index')}}" class="btn btn-sm btn-warning">Clear</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <strong>Order List</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table  table-hover align-middle">
                <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Customer Name</th>
                    <th>Seller Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Ordered Date</th>
                    <th>Complete Date</th>                    
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $key => $order)
                    
                        <tr>
                            <td>{{$orders->firstItem()+$key}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->admin->name}}</td>
                            <td>{{$order->total_amount}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->complete_date}}</td>
                            <td>
                                    <a href="{{ route('order.view', ['order' => $order]) }}" class="btn btn-sm btn-success">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <form action="{{ route('order.destroy', ['order' => $order]) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
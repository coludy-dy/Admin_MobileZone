@extends('layouts.app', [
    'active' => 'order'
])

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('order.index') }}" class="btn  btn-success shadow-sm"> <i class="fa-solid fa-arrow-left me-1"></i>Back</a>
    </div>

    <div class="d-flex justify-content-center">
        <div class="card shadow-lg border-0 rounded-4 col-md-8">
            <div class="card-header bg-success text-white rounded-top-4">
                <h5 class="mb-0">Order Detail</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Name</th>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>
                                    @foreach ($order->orderItems as $item)
                                        {{ optional($item->product)->name }},<br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td>{{ $order->amount }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $order->status }}</td>
                            </tr>
                            <tr>
                                <th>Ordered Date</th>
                                <td>{{ Carbon\Carbon::parse($order->ordered_date)->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Complete Date</th>
                                <td>{{ Carbon\Carbon::parse($order->complete_date)->format('d-m-Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

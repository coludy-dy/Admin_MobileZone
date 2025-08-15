@extends('layouts.app', ['active' => 'order'])

@section('content')
<div class="container-fluid px-4">
    <h4 class="mb-4">Order Management</h4>

    {{-- Search Card --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success d-flex justify-content-between align-items-center text-white">
            <strong>Search Orders</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('order.index') }}" method="GET">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" 
                               value="{{ request('customer_name') ?? '' }}" placeholder="Search by customer name">
                    </div>

                    <div class="col-md-4">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" id="product_name" 
                               value="{{ request('product_name') ?? '' }}" placeholder="Search by product name">
                    </div>

                    <div class="col-md-4">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" 
                               value="{{ request('quantity') ?? '' }}" placeholder="Search by quantity">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Choose Status</option>
                            @foreach ($status as $key => $value)
                                <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="created_at" class="form-label">Created Date</label>
                        <input type="date" class="form-control" name="created_at" id="created_at" 
                               value="{{ request('created_at') ?? '' }}">
                    </div>

                    <div class="col-md-4">
                        <label for="complete_date" class="form-label">Complete Date</label>
                        <input type="date" class="form-control" name="complete_date" id="complete_date" 
                               value="{{ request('complete_date') ?? '' }}">
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary me-2"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                    <a href="{{ route('order.index') }}" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i> Clear</a>
                </div>
            </form>
        </div>
    </div>

    {{-- Orders Table --}}
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <strong>Order List</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Seller</th>
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
                            <td>{{ $orders->firstItem() + $key }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->admin->name }}</td>
                            <td>${{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                @php
                                    $badgeClass = match($order->status) {
                                        'pending' => 'bg-warning text-dark',
                                        'completed' => 'bg-success',
                                        'cancelled' => 'bg-danger',
                                        default => 'bg-secondary',
                                    };
                                @endphp
                                <span class="badge {{ $badgeClass }}">{{ ucfirst($order->status) }}</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->complete_date)->format('d-m-Y') }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('order.view', ['order' => $order]) }}" class="btn btn-sm btn-success" title="View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <form action="{{ route('order.destroy', ['order' => $order]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

           
        </div>
    </div>
</div>
@endsection

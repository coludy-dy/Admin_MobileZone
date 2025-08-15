@extends('layouts.app', ['active' => 'product'])

@section('content')
<div class="container-fluid px-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Product Management</h4>
        <a href="{{ route('product.create') }}" class="btn btn-success shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> Create Product
        </a>
    </div>

    <!-- Search Filters -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white fw-bold">
            Search Products
        </div>
        <div class="card-body">
            <form action="{{ route('product.index') }}" method="GET">
                @csrf
                <div class="row g-3">
                    <div class="col-md-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ request('name') ?? '' }}" placeholder="Search by name">
                    </div>
                    <div class="col-md-3">
                        <label for="brand" class="form-label">Brand</label>
                        <select name="brand" id="brand" class="form-control select2">
                            <option value="">Choose brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="ram" class="form-label">RAM</label>
                        <select name="ram" id="ram" class="form-control select2">
                            <option value="">Choose RAM</option>
                            @foreach ($rams as $key => $value)
                                <option value="{{ $key }}" {{ request('ram') == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="storage" class="form-label">Storage</label>
                        <select name="storage" id="storage" class="form-control select2">
                            <option value="">Choose Storage</option>
                            @foreach ($storages as $key => $value)
                                <option value="{{ $key }}" {{ request('storage') == $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="price" value="{{ request('price') ?? '' }}" placeholder="Search by price">
                    </div>
                    <div class="col-md-12 text-end mt-2">
                        <button class="btn btn-primary me-2"><i class="fa-solid fa-magnifying-glass me-1"></i> Search</button>
                        <a href="{{ route('product.index') }}" class="btn btn-warning text-black"><i class="fa-solid fa-rotate-left"></i> Clear</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Product List -->
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">
            Product List
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light text-uppercase">
                    <tr>
                        <th style="width:50px;">No</th>
                        <th>Brand</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Storage</th>
                        <th>Status</th>
                        <th style="width:150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $key => $product)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ optional($product->brand)->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$product->img_path) }}" alt="Product Image" class="rounded" width="50">
                            </td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ number_format($product->price) }}</td>
                            <td>{{ $product->storage }}</td>
                            <td>
                                <span class="badge bg-{{ $product->status == 'available' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($product->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('product.view', $product) }}" class="btn btn-sm btn-success me-1" title="View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <a href="{{ route('product.edit', $product) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('product.destroy', $product) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="9" class="text-center text-muted">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@extends('layouts.app', ['active' => 'product'])

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Product</h4>
            <a href="{{ route('product.create') }}" class="btn btn-success">Create</a>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <strong>Search Products</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('product.index') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{request('name')?? ''}}" placeholder="Search by name">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="brand" class="form-label">Brand Name</label>
                            <select name="brand" id="brand" class="form-control select2">
                                <option value="">Choose brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{ request('brand') == $brand->id? 'selected' : ''}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="ram" class="form-label">RAM</label>
                            <select name="ram" id="ram" class="form-control select2">
                                <option value="">Choose RAM</option>
                                @foreach ($rams as $key => $value)
                                    <option value="{{$key}}" {{ request('ram') == $key? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="storage" class="form-label">Storage</label>
                            <select name="storage" id="storage" class="form-control select2">
                                <option value="">Choose Storage</option>
                                @foreach ($storages as $key => $value)
                                    <option value="{{$key}}" {{ request('storage') == $key? 'selected' : ''}}>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="price" value="{{request('price')?? ''}}" placeholder="Search by price">
                        </div>
                        <div class="col-md-12 text-end">
                            <button class="btn btn-primary btn-sm">Search</button>
                            <a href="{{ route('product.index') }}" class="btn btn-warning btn-sm">Clear</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <strong>Product List</strong>
            </div>
            <div class="card-body table-responsive">
                <table class="table  table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Storage</th>
                            <th>Status</th>
                            <th width="150">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key => $product)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ optional($product->brand)->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/'.$product->img_path) }}" alt="Product Image" width="40">
                                </td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->storage }}</td>
                                <td>
                                    <span class="badge bg-{{ $product->status == 'available' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('product.view', ['product' => $product]) }}" class="btn btn-sm btn-success">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('product.destroy', ['product' => $product]) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
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

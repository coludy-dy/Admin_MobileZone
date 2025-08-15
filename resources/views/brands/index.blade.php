@extends('layouts.app', ['active' => 'brand'])

@section('content')
<div class="container-fluid px-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Brand Management</h4>
        <a href="{{ route('brand.create') }}" class="btn btn-success shadow-sm">
            <i class="fa-solid fa-plus me-1"></i> Create Brand
        </a>
    </div>

    <!-- Search Form -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white fw-bold">
            Search Brands
        </div>
        <div class="card-body">
            <form action="{{ route('brand.index') }}" method="GET">
                @csrf
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ request('name') ?? '' }}" placeholder="Enter brand name">
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fa-solid fa-magnifying-glass me-1"></i> Search
                        </button>
                        <a href="{{ route('brand.index') }}" class="btn btn-warning text-black">
                            <i class="fa-solid fa-rotate-left"></i> Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Brand List -->
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">
            Brand List
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light text-uppercase">
                    <tr>
                        <th style="width:50px;">No</th>
                        <th>Brand Name</th>
                        <th style="width:150px;">Create Date</th>
                        <th style="width:120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($brands as $key => $brand)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ Carbon\Carbon::parse($brand->created_at)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('brand.edit', $brand) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form action="{{ route('brand.destroy', $brand) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this brand?')">
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
                            <td colspan="4" class="text-center text-muted">No brands found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

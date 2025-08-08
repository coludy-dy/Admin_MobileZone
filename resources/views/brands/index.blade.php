@extends('layouts.app',['active' => 'brand'])

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Brand</h4>
            <a href="{{ route('brand.create')}}" class="btn btn-success">Create</a>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <strong>Search Brands</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('brand.index')}}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{request('name')?? ''}}" placeholder="Search by name">
                        </div>

                        <div class="col-md-4 mt-2">
                            <button class="btn btn-sm btn-primary mt-4">Search</button>
                            <a href="{{route('brand.index')}}" class="btn btn-sm btn-warning mt-4">Clear</a>
                        </div>
                    </div>
                </form> 
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <strong>Brand List</strong>
            </div>
            <div class="card-body table-responsive">
                <table class="table  table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Brand Name</th>
                            <th>Create Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $key => $brand)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $brand->name}}</td>
                                <td>{{ Carbon\Carbon::parse($brand->created_at)->format('d-m-Y')}}</td>
                                <td>
                                    <a href="{{ route('brand.edit', ['brand' => $brand]) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('brand.destroy', ['product' => $brand]) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        {{-- @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">No products found.</td>
                            </tr> --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    
@endpush
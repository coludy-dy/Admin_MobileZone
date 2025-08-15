@extends('layouts.app', ['active' => 'brand'])

@php
    $route = $brand ? 'brand.update' : 'brand.store';
@endphp

@section('content')
<div class="container my-5">
    <!-- Back Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('brand.index') }}" class="btn  btn-success shadow-sm">
            <i class="fa-solid fa-arrow-left me-1"></i> Back
        </a>
    </div>

    <!-- Brand Form Card -->
    <div class="d-flex justify-content-center">
        <div class="card shadow-lg rounded-4 col-md-6">
            <div class="card-header bg-success text-white fw-bold">
                <h5 class="mb-0">{{ $brand ? 'Edit Brand' : 'Create Brand' }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route($route, ['brand' => $brand ?? null]) }}" method="POST">
                    @csrf
                    @if($brand) 
                        @method('PUT') 
                    @endif

                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Brand Name</label>
                        <input 
                            type="text" 
                            class="form-control form-control-lg" 
                            name="name" 
                            id="name" 
                            value="{{ $brand ? $brand->name : '' }}" 
                            placeholder="Enter Brand Name"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-success  shadow-sm">
                        {{ $brand ? 'Update Brand' : 'Create Brand' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

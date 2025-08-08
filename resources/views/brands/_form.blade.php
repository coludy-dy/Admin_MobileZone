@extends('layouts.app', ['active' => 'brand'])
@php
    $route = $brand? 'brand.update' : 'brand.store'
@endphp
@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('brand.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card col-md-6">
            <div class="card-header">
                <h5>Add Brand Name</h5>
            </div>
            <div class="card-body">
                <form action="{{route($route,['brand' => $brand?? null])}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter Brand Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $brand? $brand->name : ''}}" placeholder="Enter Brand Name">
                    </div>
                    <button type="submit" class="btn btn-success">{{$brand? 'Update' : 'Create'}}</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
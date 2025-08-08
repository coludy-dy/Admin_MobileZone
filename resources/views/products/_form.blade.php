@extends('layouts.app',[
    'active' => 'product'
])
@php
    $route = $product? 'product.update' : 'product.store'
@endphp
@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('product.index')}}" class="btn btn-sm btn-primary">Back</a>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card col-md-12">
            <di class="card-header">
                <h5>{{$product? 'Edit Product' : 'Create Product'}}</h5>
            </di>
            <form action="{{route($route,['product' => $product])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$product? $product->name : ''}}" placeholder="Enter product title" required/>
                        </div>
                        <div class="col-md-6">
                            <label for="brand" class="form-label">Brand Name<span class="text-danger">*</span></label>
                            <select name="brand" id="brand" class="form-control select2">
                                <option value="">Choose Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{ $product? ($product->brand_id == $brand->id? 'selected' : '') : ''}}>{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                            <textarea name="description" id="description" value="{{$product? $product->description : ''}}" rows="5" class="form-control"></textarea>
                        </div>

                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                        <label for="camera">Camera<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="camera" id="camera" value="{{$product? $product->camera : ''}}" placeholder="e.g. 50MP Dual Camera" required/> 
                        </div>
                        <div class="col-md-6">
                            <label for="battery" class="form-label">Battery<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="battery" id="battery" value="{{$product? $product->battery : ''}}" placeholder="e.g. 5000mAh" required/>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="ram" class="form-label">RAM<span class="text-danger">*</span></label>
                                <select name="ram" id="ram" class="form-control select3">
                                    <option value="">Choose RAM</option>
                                    <option value="8gb" {{ $product? ($product->ram == '8gb'? 'selected' : '') : ''}}>8GB</option>
                                    <option value="16gb" {{ $product? ($product->ram == '16gb'? 'selected' : '') : ''}}>16GB</option>
                                    <option value="32gb" {{ $product? ($product->ram == '32gb'? 'selected' : '') : ''}}>32GB</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                            <label for="storage" class="form-label">Storage<span class="text-danger">*</span></label>
                                <select name="storage" id="storage" class="form-control select3">
                                    <option value="">Choose Storage</option>
                                    <option value="128gb" {{ $product? ($product->storage == '128gb'? 'selected' : '') : ''}}>128GB</option>
                                    <option value="256gb" {{ $product? ($product->storage == '256gb'? 'selected' : '') : ''}}>256GB</option>
                                    <option value="512gb" {{ $product? ($product->storage == '512gb'? 'selected' : '') : ''}}>512GB</option>
                                </select>
                        </div>
                    </div>
                    <dvi class="row mb-2">
                        <div class="col-md-6">
                            <label for="color" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control select2">
                                    <option value="">Choose Status</option>
                                    <option value="available"  {{ $product? ($product->status == 'available'? 'selected' : '') : ''}} >Available</option>
                                    <option value="out of stock"  {{ $product? ($product->status == 'out of stock'? 'selected' : '') : ''}}>Out of Stock</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{$product? $product->price : ''}}"  placeholder="e.g. 650000 MMK" required/>
                        </div>
                    </dvi>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="image" class="form-label"> Main Product Image<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" id="image" accept="image/*" @if (!$product) required @endif/>
                            {{-- @if ($product)
                                <label for=""><a href=""><i class="fa-regular fa-eye">{{$product->img_name}}</a></label>
                            @endif --}}
                        </div>
                        <div class="col-md-6">
                            <label for="additionals" class="form-label">Additional images<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="additionals[]" id="additionals" accept="image/*" multiple @if (!$product) required @endif />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="screen_size">Display Size<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="screen_size" id="screen_size" value="{{$product? $product->screen_size : ''}}" placeholder='e.g. 6.3" AMOLED' required/>
                        </div>
                        <div class="col-md-6">
                            <label for="color" class="form-label">Color<span class="text-danger">*</span></label>
                            <select name="color" id="color" class="form-control select2">
                                <option value="">Choose Color</option>
                                <option value="white">White</option>
                                <option value="black">Black</option>
                                <option value="blue">Blue</option>
                                <option value="pink">Pink</option>
                                <option value="gray">Gray</option>
                                <option value="purple">Purple</option>
                            </select>
                        </div>
                    </div>
                    <dvi class="row mb-2">
                        {{-- <div class="col-md-6">
                            <label for="color" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control select2">
                                    <option value="">Choose Status</option>
                                    <option value="available"  {{ $product? ($product->status == 'available'? 'selected' : '') : ''}} >Available</option>
                                    <option value="out of stock"  {{ $product? ($product->status == 'out of stock'? 'selected' : '') : ''}}>Out of Stock</option>
                                </select>
                        </div> --}}
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="numeric" class="form-control" name="stock" id="stock" value="{{$product? $product->stock : ''}}"  placeholder="e.g. 650000 MMK" required/>
                        </div>
                    </dvi>
                    <div class="d-flex justify-content-end mt-4  mb-2">
                        @if ($product)
                            <button type="submit" class="btn btn-success">Update</button>
                        @else
                            <button type="submit" class="btn btn-success">Create</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection
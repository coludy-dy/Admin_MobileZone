@extends('layouts.app')

@section('content')
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-box fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text">{{$product_count}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-shopping-cart fa-3x mb-3 text-info"></i>
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text">{{$order_count}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-users fa-3x mb-3 text-warning"></i>
                    <h5 class="card-title">Registered Users</h5>
                    <p class="card-text">{{$register_count}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-money-bill-wave fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Revenue</h5>
                    <p class="card-text">12,500,000 MMK</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-warehouse fa-3x mb-3 text-danger"></i>
                    <h5 class="card-title">Stock</h5>
                    <p class="card-text">25</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-warehouse fa-3x mb-3"></i>
                    <h5 class="card-title">Others</h5>
                    <p class="card-text">25</p>
                </div>
            </div>
        </div>
    </div>
@endsection
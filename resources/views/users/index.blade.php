@extends('layouts.app',['active'=>'user'])

@section('content')
    <div class="container-fluid px-4">
        <h4 class="mb-3">User</h4>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white">
                <strong>Search Customers</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('user.index')}}" method="GET">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{request('name')?? ''}}" placeholder="Search by name">
                        </div>

                        <div class="col-md-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone" value="{{request('phone')?? ''}}" placeholder="Search by phone">
                        </div class="col-md-4">

                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{request('email')?? ''}}" placeholder="Search by email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="created_at" class="form-label">Date</label>
                            <input type="date" class="form-control" name="created_at" value="{{request('created_at')?? ''}}" id="created_at">
                        </div>

                        <div  class="col-md-4 mt-4">
                            <button class="btn btn-sm btn-primary mt-2">Search</button>
                            <a href="{{route('user.index')}}" class="btn btn-sm btn-warning mt-2">Clear</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <strong>Customers List</strong>
            </div>
            <div class="card-body table-responsive">
                <table class="table  table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Regristration Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{$users->firstItem()+$key}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{Carbon\Carbon::parse($user->created_at)->format('d-m-Y')}}</td>                    
                                <td>
                                    <a href="{{ route('user.view', ['user' => $user]) }}" class="btn btn-sm btn-success">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <form action="{{ route('user.destroy', ['user' => $user]) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
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
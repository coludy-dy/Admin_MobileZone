@extends('layouts.app', ['active' => 'user'])

@section('content')
<div class="container-fluid px-4">
    <h4 class="mb-4">User Management</h4>

    {{-- Search Card --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <strong>Search Customers</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('user.index') }}" method="GET">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" 
                               value="{{ request('name') ?? '' }}" placeholder="Search by name">
                    </div>

                    <div class="col-md-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone" 
                               value="{{ request('phone') ?? '' }}" placeholder="Search by phone">
                    </div>

                    <div class="col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" 
                               value="{{ request('email') ?? '' }}" placeholder="Search by email">
                    </div>
                </div>

                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="created_at" class="form-label">Registration Date</label>
                        <input type="date" class="form-control" name="created_at" 
                               id="created_at" value="{{ request('created_at') ?? '' }}">
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary me-2 mt-2">
                            <i class="fa-solid fa-magnifying-glass"></i> Search
                        </button>
                        <a href="{{ route('user.index') }}" class="btn btn-warning mt-2">
                            <i class="fa-solid fa-rotate-left"></i> Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Users Table --}}
    <div class="card shadow-sm">
        <div class="card-header text-white bg-success">
            <strong>Customer List</strong>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Registration Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('user.view', ['user' => $user]) }}" class="btn btn-sm btn-success" title="View">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                <form action="{{ route('user.destroy', ['user' => $user]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                            <td colspan="7" class="text-center text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection

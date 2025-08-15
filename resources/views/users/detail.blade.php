@extends('layouts.app', [
    'active' => 'user'
])

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('user.index') }}" class="btn  btn-success shadow-sm"><i class="fa-solid fa-arrow-left me-1"></i>Back</a>
    </div>

    <div class="d-flex justify-content-center">
        <div class="card shadow-lg border-0 rounded-4 col-md-8">
            <div class="card-header bg-success  text-white rounded-top-4">
                <h5 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>User Information</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                            @if(!empty($user->created_at))
                            <tr>
                                <th>Registered At</th>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

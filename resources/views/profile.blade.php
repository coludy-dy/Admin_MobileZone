@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.index') }}"  class="btn btn-sm btn-primary shadow-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="d-flex justify-content-center">
        <div class="card shadow-lg border-0 rounded-4 col-md-8">
            <div class="card-header bg-primary text-white rounded-top-4">
                <h5 class="mb-0"><i class="bi bi-shield-lock-fill me-2"></i>Admin Information</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <tbody>
                            <tr>
                                <th style="width: 200px;">Name</th>
                                <td>{{ $login->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $login->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $login->phone }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

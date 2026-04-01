@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- TOP BUTTON -->
    <div class="d-flex justify-content-between mb-3">
        <h4>Company Details</h4>

        <a href="/admin/employer/create" class="btn btn-primary">
            + Add Employer
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <strong>Company Name:</strong><br>
                    {{ $company->company_name }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Email:</strong><br>
                    {{ $company->user->email ?? '-' }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Phone:</strong><br>
                    {{ $company->phone }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Website:</strong><br>
                    {{ $company->website ?? '-' }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Company Size:</strong><br>
                    {{ $company->company_size ?? '-' }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Industry:</strong><br>
                    {{ $company->industry_type }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Country:</strong><br>
                    {{ $company->country }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>State:</strong><br>
                    {{ $company->state }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>City:</strong><br>
                    {{ $company->city }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Address:</strong><br>
                    {{ $company->address }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Description:</strong><br>
                    {{ $company->description ?? '-' }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Founded Year:</strong><br>
                    {{ $company->founded_year ?? '-' }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Created At:</strong><br>
                    {{ $company->created_at->format('d M Y') }}
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Created By:</strong><br>
                    @if($company->creator && $company->creator->role == 'admin')
                        <span class="badge bg-primary">Admin</span>
                    @else
                        <span class="badge bg-success">Employer</span>
                    @endif
                </div>

            </div>

        </div>
    </div>

    <!-- EDIT BUTTON -->
    <div class="text-center mt-3">
        <a href="/admin/employer/edit/{{ $company->id }}" class="btn btn-warning">
            Edit
        </a>
    </div>

</div>

@endsection
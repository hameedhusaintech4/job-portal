@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h5 class="mb-0">Companies List</h5>

            <a href="/admin/employer/create" class="btn btn-light btn-sm">
                + Create Employer
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Website</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($companies as $company)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $company->company_name }}</td>

                                <td>
                                    @if($company->website)
                                        <a href="{{ $company->website }}" target="_blank">
                                            Visit
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>
                                    @if($company->creator && $company->creator->role == 'admin')
                                        <span class="badge bg-primary">Admin</span>
                                    @else
                                        <span class="badge bg-success">Employer</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $company->created_at->format('d M Y') }}
                                </td>

                                <td>
                                    <a href="/admin/employer/{{ $company->id }}" class="btn btn-sm btn-info">
                                        View
                                    </a>
                                    <a href="/admin/employer/edit/{{ $company->id }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No Data Found</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection
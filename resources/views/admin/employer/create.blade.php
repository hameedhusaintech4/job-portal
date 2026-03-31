@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Create Employer</h5>
        </div>

        <div class="card-body">

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- VALIDATION ERRORS -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/admin/employer/store">
                @csrf

                <div class="row">

                    <!-- Company Name -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Company Name <span class="text-danger">*</span></label>
                        <input type="text" name="company_name" class="form-control" required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <!-- Password -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <!-- Website -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Website</label>
                        <input type="text" name="website" class="form-control">
                    </div>

                    <!-- Company Size -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Company Size</label>
                        <select name="company_size" class="form-control">
                            <option value="">Select</option>
                            <option>1-10</option>
                            <option>10-50</option>
                            <option>50+</option>
                        </select>
                    </div>

                    <!-- Industry Type -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Industry Type <span class="text-danger">*</span></label>
                        <input type="text" name="industry_type" class="form-control" required>
                    </div>

                    <!-- Country -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Country <span class="text-danger">*</span></label>
                        <input type="text" name="country" class="form-control" required>
                    </div>

                    <!-- State -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">State <span class="text-danger">*</span></label>
                        <input type="text" name="state" class="form-control" required>
                    </div>

                    <!-- City -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">City <span class="text-danger">*</span></label>
                        <input type="text" name="city" class="form-control" required>
                    </div>

                    <!-- Founded Year -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Founded Year</label>
                        <input type="number" name="founded_year" class="form-control">
                    </div>

                    <!-- Address -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea name="address" class="form-control" rows="1" required></textarea>
                    </div>

                    <!-- Description -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="1"></textarea>
                    </div>

                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button class="btn btn-primary">Create Employer</button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
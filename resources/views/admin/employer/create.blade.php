@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    
    <div class="card shadow-sm">

        <!-- 🔹 DYNAMIC HEADER -->
        <div class="card-header {{ isset($company) ? 'bg-warning text-dark' : 'bg-primary text-white' }}">
            <h5 class="mb-0">
                {{ isset($company) ? 'Edit Employer' : 'Create Employer' }}
            </h5>
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

            <!-- 🔹 DYNAMIC FORM -->
            <form method="POST" action="{{ isset($company) ? '/admin/employer/update/'.$company->id : '/admin/employer/store' }}">
                @csrf

                @if(isset($company))
                    @method('PUT')
                @endif

                <div class="row">

                    <!-- Company Name -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Company Name <span class="text-danger">*</span></label>
                        <input type="text" name="company_name" class="form-control"
                               value="{{ $company->company_name ?? old('company_name') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control"
                               value="{{ $company->user->email ?? old('email') }}" required>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control"
                               value="{{ $company->phone ?? old('phone') }}" required>
                    </div>

                    <!-- Password -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Password 
                            @if(!isset($company)) 
                                <span class="text-danger">*</span>
                            @endif
                        </label>
                        <input type="password" name="password" class="form-control"
                               {{ isset($company) ? '' : 'required' }}>

                        @if(isset($company))
                            <small class="text-muted">Leave blank to keep same password</small>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Confirm Password 
                            @if(!isset($company)) 
                                <span class="text-danger">*</span>
                            @endif
                        </label>
                        <input type="password" name="password_confirmation" class="form-control"
                               {{ isset($company) ? '' : 'required' }}>
                    </div>

                    <!-- Website -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Website</label>
                        <input type="text" name="website" class="form-control"
                               value="{{ $company->website ?? old('website') }}">
                    </div>

                    <!-- Company Size -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Company Size</label>
                        <select name="company_size" class="form-control">
                            <option value="">Select</option>
                            <option {{ ($company->company_size ?? '') == '1-10' ? 'selected' : '' }}>1-10</option>
                            <option {{ ($company->company_size ?? '') == '10-50' ? 'selected' : '' }}>10-50</option>
                            <option {{ ($company->company_size ?? '') == '50+' ? 'selected' : '' }}>50+</option>
                        </select>
                    </div>

                    <!-- Industry Type -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Industry Type <span class="text-danger">*</span></label>
                        <input type="text" name="industry_type" class="form-control"
                               value="{{ $company->industry_type ?? old('industry_type') }}" required>
                    </div>

                    <!-- Country -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Country <span class="text-danger">*</span></label>
                        <input type="text" name="country" class="form-control"
                               value="{{ $company->country ?? old('country') }}" required>
                    </div>

                    <!-- State -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">State <span class="text-danger">*</span></label>
                        <input type="text" name="state" class="form-control"
                               value="{{ $company->state ?? old('state') }}" required>
                    </div>

                    <!-- City -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">City <span class="text-danger">*</span></label>
                        <input type="text" name="city" class="form-control"
                               value="{{ $company->city ?? old('city') }}" required>
                    </div>

                    <!-- Founded Year -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Founded Year</label>
                        <input type="number" name="founded_year" class="form-control"
                               value="{{ $company->founded_year ?? old('founded_year') }}">
                    </div>

                    <!-- Address -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea name="address" class="form-control" rows="1" required>{{ $company->address ?? old('address') }}</textarea>
                    </div>

                    <!-- Description -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="1">{{ $company->description ?? old('description') }}</textarea>
                    </div>

                </div>

                <!-- SUBMIT BUTTON -->
                <div class="text-center">
                    <button class="btn {{ isset($company) ? 'btn-warning' : 'btn-primary' }}">
                        {{ isset($company) ? 'Update Employer' : 'Create Employer' }}
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
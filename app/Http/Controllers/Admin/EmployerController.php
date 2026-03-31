<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompanyRegistration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    // Show form (optional if already created)
    public function create()
    {
        return view('admin.employer.create');
    }

    // Store employer + company
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|confirmed|min:6',
            'industry_type' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        // ✅ STEP 1: STORE IN USERS TABLE
        $user = User::create([
            'name' => $request->company_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'employer',
        ]);

        // ✅ STEP 2: STORE IN COMPANY TABLE
        CompanyRegistration::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'website' => $request->website,
            'company_size' => $request->company_size,
            'industry_type' => $request->industry_type,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'description' => $request->description,
            'founded_year' => $request->founded_year,
             'created_by' => Auth::id(),
        ]);

        return redirect('/admin/dashboard')->with('success', 'Employer Created Successfully');
    }
    // 🔹 LIST PAGE (renamed from index → employers)
    public function employers()
    {
        $companies = CompanyRegistration::with(['user', 'creator'])->latest()->get();

        return view('admin.employer.employers', compact('companies'));
    }
}
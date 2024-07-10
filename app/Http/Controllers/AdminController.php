<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\Landlord;
use App\Models\Apartment;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Get counts for tenants, landlords, and apartments
            $tenantCount = Tenant::count();
            $landlordCount = Landlord::count();
            $apartmentCount = Apartment::count();
            
            // Render the admin dashboard view with the counts
            return view('admin.dashboard', compact('tenantCount', 'landlordCount', 'apartmentCount'));
        }

        // Redirect non-admin users to the home page or any other page
        return redirect('/home')->with('error', 'You do not have access to this page.');
    }

    public function reports()
    {
        // Logic to generate reports
        return view('admin.reports');
    }
}

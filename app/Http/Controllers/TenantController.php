<?php
// app/Http/Controllers/TenantController.php
namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Feedback;
use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function index() {
        if (auth()->user()->role !== 'tenant') {
            return redirect('/home'); 
        }

        return view('tenant.dashboard');
        
    }

    public function viewApartments() {
        if (auth()->user()->role !== 'tenant') {
            return redirect('/home'); 
        }

        $apartments = Apartment::all(); // Adjust as necessary to show available apartments
        return view('tenant.apartments', compact('apartments'));
    }

    public function submitMaintenanceRequest(Request $request) {
        if (auth()->user()->role !== 'tenant') {
            return redirect('/home'); // Or another route
        }

        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        MaintenanceRequest::create([
            'tenant_id' => Auth::user()->id,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()->route('tenant.dashboard')->with('success', 'Maintenance request submitted.');
    }

    public function giveFeedback(Request $request) {

        if (auth()->user()->role !== 'tenant') {
            return redirect('/home'); // Or another route
        }

        $request->validate([
            'feedback' => 'required|string|max:255',
        ]);

        Feedback::create([
            'tenant_id' => Auth::user()->id,
            'feedback' => $request->feedback,
        ]);

        // Save feedback to database (create a Feedback model and migration if necessary)

        return redirect()->route('tenant.dashboard')->with('success', 'Feedback submitted.');
    }
}

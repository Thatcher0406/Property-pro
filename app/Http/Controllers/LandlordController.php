<?php
namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\TenantApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandlordController extends Controller
{
    public function index() {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }
        return view('landlord.dashboard');
    }

    public function viewApplications() {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }
        $applications = TenantApplication::whereHas('apartment', function ($query) {
            $query->where('landlord_id', Auth::id());
        })->get();

        return view('landlord.applications', compact('applications'));
    }

    public function approveApplication(TenantApplication $application) {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }
        $application->update(['status' => 'approved']);
        return redirect()->route('landlord.applications')->with('success', 'Application approved successfully.');
    }

    public function rejectApplication(TenantApplication $application) {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }
        $application->update(['status' => 'rejected']);
        return redirect()->route('landlord.applications')->with('success', 'Application rejected successfully.');
    }

    public function indexApartments() {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }
        $apartments = Apartment::where('landlord_id', Auth::id())->get();
        return view('landlord.apartments.index', compact('apartments'));
    }

    public function createApartment() {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }
        return view('landlord.apartments.create');
    }

    public function storeApartment(Request $request) {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Apartment::create([
            'name' => $request->name,
            'location' => $request->location,
            'price' => $request->price,
            'landlord_id' => Auth::id(),
        ]);

        return redirect()->route('landlord.apartments.index')->with('success', 'Apartment created successfully.');
    }

    public function editApartment(Apartment $apartment) {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }
        return view('landlord.apartments.edit', compact('apartment'));
    }

    public function updateApartment(Request $request, Apartment $apartment) {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $apartment->update($request->all());

        return redirect()->route('landlord.apartments.index')->with('success', 'Apartment updated successfully.');
    }

    public function destroyApartment(Apartment $apartment) {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home'); 
        }
        $apartment->delete();
        return redirect()->route('landlord.apartments.index')->with('success', 'Apartment deleted successfully.');
    }
}

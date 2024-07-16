<?php
namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Application;
use App\Models\Landlord;
use App\Models\MaintenanceRequest;
use App\Models\Feedback;
use App\Models\Booking;
use App\Models\Tenant;
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

    public function manageApartments() {
        $landlord = auth()->user()->landlord;
        $apartments = Apartment::where('landlord_id', $landlord->id)->get();
        return view('landlord.apartments.index', compact('apartments'));
    }

    public function viewApplications() {
        if (auth()->user()->role !== 'landlord') {
            return redirect('/home');
        }

        auth()->user()->load('landlord');
        $landlordId = auth()->user()->landlord->id;
        $applications = Application::where('landlord_id', $landlordId)->get();
        
        return view('landlord.applications.index', compact('applications'));
    }

    public function approveApplication($id) {
        $application = Application::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        return redirect()->route('landlord.applications')->with('success', 'Application approved successfully.');
    }

    public function rejectApplication($id) {
        $application = Application::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return redirect()->route('landlord.applications')->with('success', 'Application rejected successfully.');
    }

    public function createApartment() {
        return view('landlord.apartments.create');
    }

    public function storeApartment(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'units' => 'required|integer',
            'location' => 'required|string|max:255',
            'rent' => 'required|numeric',
        ]);

        $userId = auth()->id();
        $landlord = Landlord::where('user_id', $userId)->first();

        if ($landlord) {
            $apartment = new Apartment();
            $apartment->name = $validatedData['name'];
            $apartment->address = $validatedData['address'];
            $apartment->units = $validatedData['units'];
            $apartment->location = $validatedData['location'];
            $apartment->rent = $validatedData['rent'];
            $apartment->landlord_id = $landlord->id;
            $apartment->save();

            return redirect()->route('landlord.apartments.index')->with('success', 'Apartment created successfully.');
        } else {
            return redirect()->back()->with('error', 'Landlord not found.');
        }
    }

    public function editApartment(Apartment $apartment) {
        return view('landlord.apartments.edit', compact('apartment'));
    }

    public function updateApartment(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'units' => 'required|integer',
            'location' => 'required|string|max:255',
            'rent' => 'required|numeric',
        ]);

        $userId = auth()->id();
        $landlord = Landlord::where('user_id', $userId)->first();

        if ($landlord) {
            $apartment = Apartment::find($id);

            if ($apartment && $apartment->landlord_id == $landlord->id) {
                $apartment->name = $validatedData['name'];
                $apartment->address = $validatedData['address'];
                $apartment->units = $validatedData['units'];
                $apartment->location = $validatedData['location'];
                $apartment->rent = $validatedData['rent'];
                $apartment->save();

                return redirect()->route('landlord.apartments.index')->with('success', 'Apartment updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Apartment not found or you do not have permission to update this apartment.');
            }
        } else {
            return redirect()->back()->with('error', 'Landlord not found.');
        }
    }

    public function destroyApartment(Apartment $apartment) {
        $apartment->delete();
        return redirect()->route('landlord.apartments.index')->with('success', 'Apartment deleted successfully.');
    }

    public function viewMaintenanceRequests() {
        $landlord = auth()->user()->landlord;
        $maintenanceRequests = MaintenanceRequest::where('landlord_id', $landlord->id)->get();
        return view('landlord.maintenance.index', compact('maintenanceRequests'));
    }

    public function respondMaintenanceRequest(Request $request, MaintenanceRequest $maintenanceRequest) {
        $maintenanceRequest->response = $request->response;
        $maintenanceRequest->status = 'responded';
        $maintenanceRequest->save();
        return redirect()->route('landlord.maintenance.view')->with('success', 'Maintenance request responded.');
    }

    public function viewFeedback() {
        $landlord = auth()->user()->landlord;
        $feedback = Feedback::where('landlord_id', $landlord->id)->get();
        return view('landlord.feedback.index', compact('feedback'));
    }

    public function respondFeedback(Request $request, Feedback $feedback) {
        $feedback->response = $request->response;
        $feedback->status = 'responded';
        $feedback->save();
        return redirect()->route('landlord.feedback.view')->with('success', 'Feedback responded.');
    }

    public function viewTenants() {
        $landlord = auth()->user()->landlord;
        $tenants = Tenant::where('landlord_id', $landlord->id)->get();
        return view('landlord.tenants', compact('tenants'));
    }

    public function viewTenantRentStatus($id) {
        $tenant = Tenant::findOrFail($id);
        $rentStatus = $tenant->rentPayments()->orderBy('created_at', 'desc')->get();
        return view('landlord.tenant_rent_status', compact('tenant', 'rentStatus'));
    }

    public function viewBookings() {
        $landlord = auth()->user()->landlord;
        $bookings = Booking::where('landlord_id', $landlord->id)->get();
        return view('landlord.view_bookings', compact('bookings'));
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Appointment;
use App\Models\Application;
use App\Models\User;
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

        $apartments = Apartment::all();
        return view('tenant.apartments', compact('apartments'));
    }

    public function showMaintenanceRequestForm()
    {
        return view('tenant.maintenance.create');
    }

    public function submitMaintenanceRequest(Request $request) {
        if (auth()->user()->role !== 'tenant') {
            return redirect('/home'); 
        }

        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        MaintenanceRequest::create([
            'tenant_id' => Auth::user()->id,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()->route('maintenance.request.success')->with('success', 'Maintenance request submitted successfully. We will get back to you soon.');
    }

    public function showFeedbackForm()
    {
        return view('tenant.feedback.create');
    }

    public function giveFeedback(Request $request) {
        if (auth()->user()->role !== 'tenant') {
            return redirect('/home');
        }

        $request->validate([
            'feedback' => 'required|string|max:255',
        ]);

        Feedback::create([
            'tenant_id' => Auth::user()->id,
            'feedback' => $request->feedback,
        ]);

        return redirect()->route('feedback.success')->with('success', 'Feedback submitted successfully. Thank you for your feedback.');
    }

    public function bookAppointment(Apartment $apartment)
    {
        return view('tenant.appointments.book', compact('apartment'));
    }

    public function processBookAppointment(Request $request, Apartment $apartment)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Appointment::create([
            'tenant_id' => Auth::id(),
            'apartment_id' => $apartment->id,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'pending',
        ]);

        return redirect()->route('booking.success')->with('success', 'Appointment booked successfully.');
    }

    public function submitApplicationForm(Apartment $apartment)
    {
        $apartment= Apartment::find($apartment->id);
        return view('tenant.applications.apply', compact('apartment'));
    }

    public function processApplication(Request $request, Apartment $apartment)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
        'notes' => 'nullable|string',
    ]);

    // Get the landlord_id from the apartment
    $landlord_id = $apartment->landlord_id;

    Application::create([
        'tenant_id' => Auth::id(),
        'apartment_id' => $apartment->id,
        'landlord_id' => $landlord_id, // Set the landlord_id from the apartment
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'notes' => $request->notes,
        'status' => 'pending',
    ]);

    return redirect()->route('application.success')->with('success', 'Application submitted successfully.');
}
}

<?php
namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Appointment;
use App\Models\Application;
//use App\Models\Mpesa;
use App\Models\Feedback;
use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'tenant') {
            return redirect('/home');
        }

        return view('tenant.dashboard');
    }

    public function viewApartments()
    {
        if (auth()->user()->role !== 'tenant') {
            return redirect('/home');
        }

        $apartments = Apartment::all();
        return view('tenant.apartments', compact('apartments'));
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

        Application::create([
            'tenant_id' => Auth::id(),
            'apartment_id' => $apartment->id,
            'landlord_id' => $apartment->landlord_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('application.success')->with('success', 'Application submitted successfully.');
    }

    public function showMaintenanceRequestForm()
    {
        return view('tenant.maintenance.create');
    }

    public function submitMaintenanceRequest(Request $request)
    {
        if (auth()->user()->role !== 'tenant') {
            return redirect('/home');
        }

        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $landlordId = Auth::user()->apartment->landlord_id;

        MaintenanceRequest::create([
            'tenant_id' => Auth::user()->id,
            'landlord_id' => $landlordId,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()->route('maintenance.request.success')->with('success', 'Maintenance request submitted successfully. We will get back to you soon.');
    }

    public function showFeedbackForm()
    {
        return view('tenant.feedback.create');
    }

    public function giveFeedback(Request $request)
    {
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

    // private $mpesa;

    // public function __construct(Mpesa $mpesa)
    // {
    //     $this->mpesa = $mpesa;
    // }

    // public function payRent($id)
    // {
    //     $application = Application::find($id);

    //     if (!$application) {
    //         return redirect()->back()->with('error', 'Application not found.');
    //     }

    //     if ($application->status !== 'accepted') {
    //         return redirect()->back()->with('error', 'Application not accepted.');
    //     }

    //     // Trigger the Mpesa payment process
    //     $this->initiateMpesaPayment($application);

    //     return view('tenant.payment_confirmation', compact('application'));
    // }

    // private function initiateMpesaPayment($application)
    // {
    //     // Implement Mpesa payment logic here
    //     // Example:
    //     $phoneNumber = $application->tenant->phone_number; // Ensure tenant has a phone number field
    //     $amount = $application->apartment->rent_amount;

    //     // Call your Mpesa API integration method here
    //     $response = $this->sendMpesaPaymentRequest($phoneNumber, $amount);

    //     return $response;
    // }

    // private function sendMpesaPaymentRequest($phoneNumber, $amount)
    // {
    //     // Implement Mpesa payment request here
    //     // This is a placeholder for your Mpesa API request logic
    //     // Example:
    //     $mpesa = new Mpesa();
    //     return $mpesa->requestPayment($phoneNumber, $amount);
    // }
}

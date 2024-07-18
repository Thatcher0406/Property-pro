<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function showApartments()
    {
        $apartments = Apartment::all();
        return view('tenant.apartments', compact('apartments'));
    }

    public function bookApartment($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('tenant.book_apartment', compact('apartment'));
    }

    public function storeBooking(Request $request, $id)
    {
        $request->validate([
            'booked_at' => 'required|date',
        ]);

        $apartment = Apartment::findOrFail($id); // Retrieve the apartment

        Booking::create([
            'tenant_id' => Auth::id(),
            'apartment_id' => $id,
            'landlord_id' => $apartment->landlord_id,
            'booked_at' => $request->booked_at,
        ]);

        return redirect()->route('booking.success')->with('success', 'Apartment booked successfully.');
    }
}

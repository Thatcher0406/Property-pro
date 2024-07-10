<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
    }

    public function create()
    {
        return view('admin.apartments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'rent' => 'required|numeric',
        ]);

        Apartment::create($request->all());
        return redirect()->route('admin.apartments.index')->with('success', 'Apartment created successfully.');
    }

    public function show($id)
    {
        $apartment = Apartment::find($id);
        return view('admin.apartments.show', compact('apartment'));
    }
    

    public function edit(Apartment $apartment)
    {
        return view('admin.apartments.edit', compact('apartment'));
    }

    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'rent' => 'required|numeric',
        ]);

        $apartment->update($request->all());
        return redirect()->route('admin.apartments.index')->with('success', 'Apartment updated successfully.');
    }

    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('admin.apartments.index')->with('success', 'Apartment deleted successfully.');
    }
}

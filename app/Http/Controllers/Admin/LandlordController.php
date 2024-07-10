<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Landlord;
use Illuminate\Http\Request;

class LandlordController extends Controller
{
    public function index()
    {
        $landlords = Landlord::all();
        return view('admin.landlords.index', compact('landlords'));
    }

    public function create()
    {
        return view('admin.landlords.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:landlords',
            'phone' => 'required',
        ]);

        Landlord::create($request->all());
        return redirect()->route('admin.landlords.index')->with('success', 'Landlord created successfully.');
    }

    public function show(Landlord $landlord)
    {
        return view('admin.landlords.show', compact('landlord'));
    }

    public function edit(Landlord $landlord)
    {
        return view('admin.landlords.edit', compact('landlord'));
    }

    public function update(Request $request, Landlord $landlord)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:landlords,email,'.$landlord->id,
            'phone' => 'required',
        ]);

        $landlord->update($request->all());
        return redirect()->route('admin.landlords.index')->with('success', 'Landlord updated successfully.');
    }

    public function destroy(Landlord $landlord)
    {
        $landlord->delete();
        return redirect()->route('admin.landlords.index')->with('success', 'Landlord deleted successfully.');
    }
}

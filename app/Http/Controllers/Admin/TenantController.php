<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        return view('admin.tenants.index', compact('tenants'));
    }

    public function create()
    {
        return view('admin.tenants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tenants',
            'phone' => 'required',
        ]);

        Tenant::create($request->all());
        return redirect()->route('admin.tenants.index')->with('success', 'Tenant created successfully.');
    }

    public function show(Tenant $tenant)
    {
        return view('admin.tenants.show', compact('tenant'));
    }

    public function edit(Tenant $tenant)
    {
        return view('admin.tenants.edit', compact('tenant'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tenants,email,'.$tenant->id,
            'phone' => 'required',
        ]);

        $tenant->update($request->all());
        return redirect()->route('admin.tenants.index')->with('success', 'Tenant updated successfully.');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('admin.tenants.index')->with('success', 'Tenant deleted successfully.');
    }
}

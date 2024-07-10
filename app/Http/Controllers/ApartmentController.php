<?php

namespace App\Http\Controllers;

use App\Models\Appartment;
use Illuminate\Http\Request;

class ApartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Property::create($request->all());
        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view ('properties.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property->update($request->all());
        return redirect()->route('properties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property->delete();
        return redirect()->route('properties.index');
    }
}

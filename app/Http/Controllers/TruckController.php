<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;


class TruckController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $trucks = Truck::all();
        return view('trucks.index', compact('trucks'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('trucks.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'unit_number' => 'required',
            'year' => 'required|integer|between:1900,' . (date('Y') + 5),
            'notes' => 'nullable',
        ]);

        Truck::create($request->all());

        return redirect()->route('trucks.index')
            ->with('success','Truck created successfully.');
    }

    // Display the specified resource.
    public function show(Truck $truck)
    {
        return view('trucks.show',compact('truck'));
    }

    // Show the form for editing the specified resource.
    public function edit(Truck $truck)
    {
        return view('trucks.edit',compact('truck'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'unit_number' => 'required',
            'year' => 'required|integer|between:1900,' . (date('Y') + 5),
            'notes' => 'nullable',
        ]);

        $truck->update($request->all());

        return redirect()->route('trucks.index')
            ->with('success','Truck updated successfully');
    }

    // Remove the specified resource from storage.
    public function destroy(Truck $truck)
    {
        $truck->delete();

        return redirect()->route('trucks.index')
            ->with('success','Truck deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\Subunit;
use Illuminate\Validation\Rule;

class SubunitController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $subunits = Subunit::all();
        return view('subunits.index', compact('subunits'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $trucks = Truck::all();
        return view('subunits.create', compact('trucks'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'main_truck' => 'required|integer',
            'subunit' => 'required|integer|different:main_truck',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
    
        // Check if subunit is already a subunit for another truck during the same period
        $existingSubunit = Subunit::where('subunit_truck_id', $request->get('subunit'))
            ->whereBetween('start_date', [$request->get('start_date'), $request->get('end_date')])
            ->orWhereBetween('end_date', [$request->get('start_date'), $request->get('end_date')])
            ->first();
    
        if($existingSubunit) {
            return redirect()->back()->withErrors(['subunit' => 'This truck is already a subunit for another truck during this period.']);
        }
    
        $subunit = new Subunit([
            'main_truck_id' => $request->get('main_truck'),
            'subunit_truck_id' => $request->get('subunit'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
        ]);
    
        $subunit->save();
    
        return redirect('/subunits')->with('success', 'Subunit has been added');
    }

    // Display the specified resource.
    public function show(Subunit $subunit)
    {
        return view('subunits.show',compact('subunit'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
    $subunit = Subunit::find($id);
    $trucks = Truck::all();

    if(is_null($subunit)) {
        return redirect()->route('subunits.index')->with('error', 'Subunit Not Found');
    }
    return view('subunits.edit', ['subunit' => $subunit, 'trucks' => $trucks]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Subunit $subunit)
{
    $request->validate([
        'main_truck_id' => [
            'required',
            Rule::notIn([$subunit->subunit_truck_id]), // Truck cannot be its own subunit
        ],
        'subunit_truck_id' => [
            'required',
            Rule::notIn([$subunit->main_truck_id]), // Truck cannot be its own main truck
        ],
        'start_date' => [
            'required',
            'date',
            'before_or_equal:end_date',
            function ($attribute, $value, $fail) use ($subunit) {
                $overlap = Subunit::where('id', '!=', $subunit->id)
                    ->where('main_truck_id', $subunit->main_truck_id)
                    ->where(function ($query) use ($value) {
                        $query->whereDate('start_date', '<=', $value)
                            ->whereDate('end_date', '>=', $value);
                    })
                    ->exists();

                if ($overlap) {
                    $fail('Subunit date range overlaps with an existing subunit for the same truck.');
                }
            },
        ],
        'end_date' => [
            'required',
            'date',
            'after_or_equal:start_date',
        ],
    ]);

    $subunit->main_truck_id = $request->input('main_truck_id');
    $subunit->subunit_truck_id = $request->input('subunit_truck_id');
    $subunit->start_date = $request->input('start_date');
    $subunit->end_date = $request->input('end_date');

    $subunit->save();

    return redirect()->route('subunits.index')->with('success', 'Subunit updated successfully.');
}


    // Remove the specified resource from storage.
    public function destroy(Subunit $subunit)
    {
        $subunit->delete();

        return redirect()->route('subunits.index')
            ->with('success','Subunit deleted successfully');
    }
}


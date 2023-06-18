@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subunit Details</h1>

        <div class="mb-3">
            <label class="form-label">Main Truck</label>
            <p>{{ $subunit->main_truck->unit_number }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label">Subunit</label>
            <p>{{ $subunit->subunit->unit_number }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label">Start Date</label>
            <p>{{ $subunit->start_date }}</p>
        </div>

        <div class="mb-3">
            <label class="form-label">End Date</label>
            <p>{{ $subunit->end_date }}</p>
        </div>

        <a href="{{ route('subunits.edit', $subunit->id) }}" class="btn btn-primary">Edit Subunit</a>
    </div>
@endsection

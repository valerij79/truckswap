@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Truck</h1>
    <form action="{{ route('trucks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="unit_number">Unit Number</label>
            <input type="text" class="form-control" id="unit_number" name="unit_number" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" min="1900" max="{{ date('Y') + 5 }}" required>
        </div>
        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea class="form-control" id="notes" name="notes"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Truck</button>
    </form>
</div>
@endsection

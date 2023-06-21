@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Subunits</h1>
    <a href="{{ route('subunits.create') }}" class="btn btn-primary mb-3">Add New Subunit</a>
    <table class="table">
        <thead>
            <tr>
                <th>Main Truck</th>
                <th>Subunit</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subunits as $subunit)
            <tr>
                <td>{{ $subunit->mainTruck->unit_number }}</td>
                <td>{{ $subunit->subunitTruck->unit_number }}</td>
                <td>{{ $subunit->start_date }}</td>
                <td>{{ $subunit->end_date }}</td>
                <td>
                    <a href="{{ route('subunits.show', $subunit->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('subunits.edit', $subunit->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('subunits.destroy', $subunit->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subunit?')">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

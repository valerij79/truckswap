@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Truck List</h1>
        <a href="{{ route('trucks.create') }}" class="btn btn-primary">Create New Truck</a>
        <table class="table">
            <thead>
            <tr>
                <th>Unit number</th>
                <th>Year</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trucks as $truck)
                <tr>
                    <td>{{ $truck->unit_number }}</td>
                    <td>{{ $truck->year }}</td>
                    <td>{{ $truck->notes }}</td>
                    <td>
                        <a href="{{ route('trucks.show', $truck) }}" class="btn btn-info">View</a>
                        <a href="{{ route('trucks.edit', $truck) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('trucks.destroy', $truck) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

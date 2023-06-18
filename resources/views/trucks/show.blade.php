@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Truck Details</h1>

        <div class="mb-3">
            <h4>Unit Number: {{ $truck->unit_number }}</h4>
            <h4>Year: {{ $truck->year }}</h4>
            <h4>Notes: {{ $truck->notes }}</h4>
        </div>

        <a href="{{ route('trucks.edit', $truck) }}" class="btn btn-warning">Edit</a>

        <form method="POST" action="{{ route('trucks.destroy', $truck) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection

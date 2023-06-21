@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Truck Details</h1>
    <ul>
        <li><strong>Unit Number:</strong> {{ $truck->unit_number }}</li>
        <li><strong>Year:</strong> {{ $truck->year }}</li>
        <li><strong>Notes:</strong> {{ $truck->notes }}</li>
    </ul>
    <a href="{{ route('trucks.edit', $truck) }}" class="btn btn-primary">Edit</a>
    <form method="POST" action="{{ route('trucks.destroy', $truck) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection

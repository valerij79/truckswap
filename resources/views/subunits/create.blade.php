@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Subunit</h1>
    <form method="POST" action="{{ route('subunits.store') }}">
        @csrf
        <div class="form-group">
            <label for="main_truck">Main Truck</label>
            <select class="form-control" id="main_truck" name="main_truck">
                @foreach($trucks as $truck)
                    <option value="{{ $truck->id }}">{{ $truck->unit_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subunit">Subunit Truck</label>
            <select class="form-control" id="subunit" name="subunit">
                @foreach($trucks as $truck)
                    <option value="{{ $truck->id }}">{{ $truck->unit_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date">
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

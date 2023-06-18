@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Subunit</h1>

        <form action="{{ route('subunits.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="main_truck" class="form-label">Main Truck</label>
                <select class="form-control" id="main_truck" name="main_truck">
                    @foreach($trucks as $truck)
                        <option value="{{ $truck->id }}">{{ $truck->unit_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="subunit" class="form-label">Subunit</label>
                <select class="form-control" id="subunit" name="subunit">
                    @foreach($trucks as $truck)
                        <option value="{{ $truck->id }}">{{ $truck->unit_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date">
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date">
            </div>

            <button type="submit" class="btn btn-primary">Add Subunit</button>

            @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
        @csrf
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Subunit</h1>

        <form action="{{ route('subunits.update', $subunit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="main_truck" class="form-label">Main Truck</label>
                <select class="form-control" id="main_truck" name="main_truck">
                    @foreach($trucks as $truck)
                        <option value="{{ $truck->id }}" {{ $truck->id == $subunit->main_truck ? 'selected' : '' }}>
                            {{ $truck->unit_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="subunit" class="form-label">Subunit</label>
                <select class="form-control" id="subunit" name="subunit">
                    @foreach($trucks as $truck)
                        <option value="{{ $truck->id }}" {{ $truck->id == $subunit->subunit ? 'selected' : '' }}>
                            {{ $truck->unit_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $subunit->start_date }}">
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $subunit->end_date }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Subunit</button>
        </form>
    </div>
@endsection

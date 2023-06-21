@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Subunit</div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('subunits.update', $subunit->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="main_truck_id" class="col-md-4 col-form-label text-md-right">Main Truck</label>

                                <div class="col-md-6">
                                    <select id="main_truck_id" name="main_truck_id" class="form-control @error('main_truck_id') is-invalid @enderror">
                                        <option value="">Select Main Truck</option>
                                        @foreach($trucks as $truck)
                                            <option value="{{ $truck->id }}" {{ $truck->id == $subunit->main_truck_id ? 'selected' : '' }}>
                                                {{ $truck->unit_number }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('main_truck_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subunit_truck_id" class="col-md-4 col-form-label text-md-right">Subunit Truck</label>

                                <div class="col-md-6">
                                    <select id="subunit_truck_id" name="subunit_truck_id" class="form-control @error('subunit_truck_id') is-invalid @enderror">
                                        <option value="">Select Subunit Truck</option>
                                        @foreach($trucks as $truck)
                                            <option value="{{ $truck->id }}" {{ $truck->id == $subunit->subunit_truck_id ? 'selected' : '' }}>
                                                {{ $truck->unit_number }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('subunit_truck_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $subunit->start_date }}" required>

                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $subunit->end_date }}" required>

                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Subunit: {{ $subunit->mainTruck->unit_number }} - {{ $subunit->subunitTruck->unit_number }}</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $subunit->mainTruck->unit_number }} - {{ $subunit->subunitTruck->unit_number }}</h5>
            <p class="card-text">
                Start Date: {{ $subunit->start_date }} <br>
                End Date: {{ $subunit->end_date }}
            </p>
            <a href="{{ route('subunits.edit', $subunit->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection

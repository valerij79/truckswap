@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Subunits</h1>

        <a href="{{ route('subunits.create') }}" class="btn btn-primary mb-3">Add new Subunit</a>

        <table class="table table-striped">
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
                        <td>{{ $subunit->main_truck }}</td>
                        <td>{{ $subunit->subunit }}</td>
                        <td>{{ $subunit->start_date }}</td>
                        <td>{{ $subunit->end_date }}</td>
                        <td>
                            <a href="{{ route('subunits.edit', $subunit) }}" class="btn btn-warning">Edit</a>

                            <form method="POST" action="{{ route('subunits.destroy', $subunit) }}">
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

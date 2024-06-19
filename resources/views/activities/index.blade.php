@extends('activities.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Activities</h2>
        <div class="card-body">

            @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('activities.create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Distance</th>
                </tr>
                </thead>

                <tbody>

                @forelse ($activities as $activity)
                    <tr>
                        <td>{{ $activity->id }}</td>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->description }}</td>
                        <td>{{ $activity->activity_type->name }}</td>
                        <td>{{ $activity->distance }} {{ $activity->distance_unit }}</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
                </tbody>

            </table>

            {!! $activities->links() !!}

        </div>
    </div>
@endsection

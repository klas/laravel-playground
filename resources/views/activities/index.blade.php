@extends('activities.layout')

@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Activities</h2>
        <div class="card-body">

            @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            <div class="d-grid d-md-flex">
                <h6>Total distance: @foreach($total_distance as $unit => $value) {{$value}} {{$unit}}, @endforeach</h6>
                <h6>total elapsed time: {{$total_time}}</h6>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Activity Type
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['activity_type_id' => null]) }}">--Reset</a></li>
                        @foreach($activity_types as $activity_type)
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['activity_type_id' => $activity_type->id]) }}">{{$activity_type->name}}</a></li>
                        @endforeach
                    </ul>
                    </div>
                </div>

                <table class="table table-bordered table-striped mt-4">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Distance</th>
                        <th>Start</th>
                        <th>Finish</th>
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
                            <td>{{ $activity->start }}</td>
                            <td>{{ $activity->finish }}</td>

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

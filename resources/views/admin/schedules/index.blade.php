@extends('layouts.app')

@section('title', 'Manage Schedules')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Schedules</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.schedules.create') }}" class="btn btn-sm btn-outline-secondary">
            Add New Schedule
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Class</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $schedule->user->name }}</td>
                <td>{{ $schedule->subject->name }}</td>
                <td>{{ $schedule->schoolClass->name }}</td>
                <td>{{ date('l', strtotime("Sunday +{$schedule->day_of_week} days")) }}</td>
                <td>{{ $schedule->start_time }}</td>
                <td>{{ $schedule->end_time }}</td>
                <td>
                    <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('title', 'My Schedule')

@section('content')
@if (session('status'))
    <div class="alert alert-info" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Schedule</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
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
                <td>{{ $schedule->subject->name }}</td>
                <td>{{ $schedule->schoolClass->name }}</td>
                <td>{{ date('l', strtotime("Sunday +{$schedule->day_of_week} days")) }}</td>
                <td>{{ $schedule->start_time }}</td>
                <td>{{ $schedule->end_time }}</td>
                <td>
                    <a href="{{ route('teacher.attendance.create', $schedule->id) }}" class="btn btn-sm btn-primary">Mark Attendance</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

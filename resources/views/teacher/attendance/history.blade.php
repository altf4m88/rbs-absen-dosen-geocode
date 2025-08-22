@extends('layouts.app')

@section('title', 'Attendance History')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Attendance History</h1>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Class</th>
                <th>Attendance Time</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Notes</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $attendance->schedule->subject->name }}</td>
                <td>{{ $attendance->schedule->schoolClass->name }}</td>
                <td>{{ $attendance->attendance_time }}</td>
                <td>{{ $attendance->latitude }}</td>
                <td>{{ $attendance->longitude }}</td>
                <td>{{ $attendance->notes }}</td>
                <td>{{ $attendance->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

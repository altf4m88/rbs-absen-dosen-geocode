@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Teacher Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">My Schedule</h5>
                <p class="card-text">View your teaching schedule and mark attendance.</p>
                <a href="{{ route('teacher.schedule.index') }}" class="btn btn-primary">View Schedule</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Attendance History</h5>
                <p class="card-text">Review your past attendance records.</p>
                <a href="{{ route('teacher.attendance.history') }}" class="btn btn-primary">View History</a>
            </div>
        </div>
    </div>
</div>
@endsection

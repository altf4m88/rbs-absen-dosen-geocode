@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="academic-icon me-3" style="width: 3.5rem; height: 3.5rem;">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">Teacher Dashboard</h1>
                    <p class="text-muted mb-0">
                        <i class="fas fa-calendar-day me-1"></i>
                        {{ date('l, F j, Y') }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="text-end">
                <small class="text-muted">Welcome back,</small>
                <div class="fw-semibold text-academic">{{ Auth::user()->name }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Teacher Dashboard Cards -->
<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h5 class="card-title">My Teaching Schedule</h5>
                <p class="card-text">
                    View your assigned teaching schedule and mark attendance for your classes.
                    Access real-time schedule updates and classroom assignments.
                </p>
                <a href="{{ route('teacher.schedule.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>View Schedule
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-history"></i>
                </div>
                <h5 class="card-title">Attendance History</h5>
                <p class="card-text">
                    Review your past attendance records and track your teaching engagement.
                    Access comprehensive attendance analytics and reports.
                </p>
                <a href="{{ route('teacher.attendance.history') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>View History
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <div class="d-flex align-items-center">
                    <i class="fas fa-bolt me-2 text-academic"></i>
                    <h6 class="mb-0 fw-semibold">Quick Actions</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                            <small class="text-muted">Current Location Verification</small>
                        </div>
                        <div class="fw-semibold">GPS Ready</div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-clock me-2 text-warning"></i>
                            <small class="text-muted">Today's Classes</small>
                        </div>
                        <div class="fw-semibold">{{ $schedules->count() ?? 0 }} Scheduled</div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-user-graduate me-2 text-success"></i>
                            <small class="text-muted">Faculty Status</small>
                        </div>
                        <div class="fw-semibold">Active</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

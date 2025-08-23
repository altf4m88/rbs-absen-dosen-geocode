@extends('layouts.app')

@section('title', 'My Teaching Schedule')

@section('content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="academic-icon me-3" style="width: 3.5rem; height: 3.5rem;">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">My Teaching Schedule</h1>
                    <p class="text-muted mb-0">
                        <i class="fas fa-chalkboard-teacher me-1"></i>
                        View your assigned classes and mark attendance
                    </p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="text-end">
                <small class="text-muted">Total Classes:</small>
                <div class="fw-semibold text-academic">{{ $schedules->count() }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Table Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-light">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fas fa-table me-2 text-academic"></i>
                <h6 class="mb-0 fw-semibold">Weekly Class Schedule</h6>
            </div>
            <small class="text-muted">Academic Year {{ date('Y') }}/{{ date('Y') + 1 }}</small>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3 fw-semibold text-muted">#</th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-book me-2"></i>Subject
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-users me-2"></i>Class
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-calendar-day me-2"></i>Day
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-clock me-2"></i>Time
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-clipboard-check me-2"></i>Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td class="px-4 py-3 text-muted">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                <div class="academic-icon me-3" style="width: 2rem; height: 2rem; font-size: 0.75rem;">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $schedule->subject->name }}</div>
                                    <small class="text-muted">{{ $schedule->subject->code ?? 'N/A' }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="badge bg-primary">{{ $schedule->schoolClass->name }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="fw-semibold">{{ date('l', strtotime("Sunday +{$schedule->day_of_week} days")) }}</div>
                            <small class="text-muted">Week Day {{ $schedule->day_of_week + 1 }}</small>
                        </td>
                        <td class="px-4 py-3">
                            <div class="fw-semibold">{{ $schedule->start_time }} - {{ $schedule->end_time }}</div>
                            <small class="text-muted">
                                @php
                                    $duration = strtotime($schedule->end_time) - strtotime($schedule->start_time);
                                    $hours = floor($duration / 3600);
                                    $minutes = floor(($duration % 3600) / 60);
                                @endphp
                                {{ $hours }}h {{ $minutes }}m duration
                            </small>
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('teacher.attendance.create', $schedule->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-map-marker-alt me-2"></i>Mark Attendance
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($schedules->isEmpty())
<div class="text-center py-5">
    <div class="academic-icon mx-auto mb-3" style="width: 4rem; height: 4rem; opacity: 0.5;">
        <i class="fas fa-calendar-times"></i>
    </div>
    <h5 class="text-muted mb-2">No Schedule Assigned</h5>
    <p class="text-muted">Contact your administrator to have classes assigned to your account.</p>
</div>
@endif

<!-- Quick Info Panel -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-info-circle me-2 text-academic"></i>
                            <small class="text-muted">Attendance Instructions</small>
                        </div>
                        <div class="fw-semibold">Location verification required</div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-shield-alt me-2 text-success"></i>
                            <small class="text-muted">GPS Status</small>
                        </div>
                        <div class="fw-semibold">Ready for verification</div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock me-2 text-warning"></i>
                            <small class="text-muted">Current Time</small>
                        </div>
                        <div class="fw-semibold">{{ date('H:i:s') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

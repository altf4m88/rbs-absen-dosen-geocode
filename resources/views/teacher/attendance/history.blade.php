@extends('layouts.app')

@section('title', 'Attendance History')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="academic-icon me-3" style="width: 3.5rem; height: 3.5rem;">
                    <i class="fas fa-history"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">My Attendance History</h1>
                    <p class="text-muted mb-0">
                        <i class="fas fa-clipboard-check me-1"></i>
                        Review your past attendance records and verification data
                    </p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="text-end">
                <small class="text-muted">Total Records:</small>
                <div class="fw-semibold text-academic">{{ $attendances->count() }}</div>
            </div>
        </div>
    </div>
</div>

<!-- Attendance History Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-light">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fas fa-table me-2 text-academic"></i>
                <h6 class="mb-0 fw-semibold">Attendance Verification Records</h6>
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
                            <i class="fas fa-book me-2"></i>Subject & Class
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-clock me-2"></i>Attendance Time
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-map-marker-alt me-2"></i>Location
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-sticky-note me-2"></i>Notes
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-check-circle me-2"></i>Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $attendance)
                    <tr>
                        <td class="px-4 py-3 text-muted">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                <div class="academic-icon me-3" style="width: 2rem; height: 2rem; font-size: 0.75rem;">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $attendance->schedule->subject->name }}</div>
                                    <small class="text-muted">{{ $attendance->schedule->schoolClass->name }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="fw-semibold">{{ date('M j, Y', strtotime($attendance->attendance_time)) }}</div>
                            <small class="text-muted">{{ date('H:i A', strtotime($attendance->attendance_time)) }}</small>
                        </td>
                        <td class="px-4 py-3">
                            <div class="fw-semibold">{{ number_format($attendance->latitude, 6) }}, {{ number_format($attendance->longitude, 6) }}</div>
                            <small class="text-muted">
                                <i class="fas fa-map-pin me-1"></i>GPS Verified
                            </small>
                        </td>
                        <td class="px-4 py-3">
                            @if($attendance->notes)
                                <span class="text-muted">{{ Str::limit($attendance->notes, 50) }}</span>
                            @else
                                <span class="text-muted fst-italic">No additional notes</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($attendance->status === 'present')
                                <span class="badge bg-success">
                                    <i class="fas fa-check me-1"></i>Present
                                </span>
                            @elseif($attendance->status === 'absent')
                                <span class="badge bg-danger">
                                    <i class="fas fa-times me-1"></i>Absent
                                </span>
                            @elseif($attendance->status === 'late')
                                <span class="badge bg-warning">
                                    <i class="fas fa-clock me-1"></i>Late
                                </span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($attendance->status) }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($attendances->isEmpty())
<div class="text-center py-5">
    <div class="academic-icon mx-auto mb-3" style="width: 4rem; height: 4rem; opacity: 0.5;">
        <i class="fas fa-clipboard-list"></i>
    </div>
    <h5 class="text-muted mb-2">No Attendance Records</h5>
    <p class="text-muted">Your attendance history will appear here once you start marking attendance.</p>
    <a href="{{ route('teacher.schedule.index') }}" class="btn btn-primary">
        <i class="fas fa-calendar-alt me-2"></i>View My Schedule
    </a>
</div>
@endif

<!-- Summary Statistics -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-check-circle me-2 text-success"></i>
                            <div>
                                <small class="text-muted">Present Records</small>
                                <div class="fw-semibold">{{ $attendances->where('status', 'present')->count() }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-clock me-2 text-warning"></i>
                            <div>
                                <small class="text-muted">Late Records</small>
                                <div class="fw-semibold">{{ $attendances->where('status', 'late')->count() }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-times-circle me-2 text-danger"></i>
                            <div>
                                <small class="text-muted">Absent Records</small>
                                <div class="fw-semibold">{{ $attendances->where('status', 'absent')->count() }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fas fa-percentage me-2 text-academic"></i>
                            <div>
                                <small class="text-muted">Attendance Rate</small>
                                <div class="fw-semibold">
                                    @if($attendances->count() > 0)
                                        {{ number_format(($attendances->where('status', 'present')->count() / $attendances->count()) * 100, 1) }}%
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

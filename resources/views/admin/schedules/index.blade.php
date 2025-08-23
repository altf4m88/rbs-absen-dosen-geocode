@extends('layouts.app')

@section('title', 'Schedule Management')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="academic-icon me-3" style="width: 3.5rem; height: 3.5rem;">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">Academic Scheduling</h1>
                    <p class="text-muted mb-0">
                        <i class="fas fa-clock me-1"></i>
                        Manage teaching schedules and class timetables
                    </p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Create Schedule
            </a>
        </div>
    </div>
</div>

<!-- Schedules Management Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-light">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fas fa-table me-2 text-academic"></i>
                <h6 class="mb-0 fw-semibold">Class Schedule Directory</h6>
            </div>
            <small class="text-muted">{{ $schedules->count() }} total schedules</small>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3 fw-semibold text-muted">#</th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-chalkboard-teacher me-2"></i>Teacher
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-book me-2"></i>Subject & Class
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-calendar-day me-2"></i>Schedule
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-clock me-2"></i>Time
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-cogs me-2"></i>Actions
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
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="fw-semibold">{{ $schedule->user->name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="fw-semibold">{{ $schedule->subject->name }}</div>
                            <small class="text-muted">Class: {{ $schedule->schoolClass->name }}</small>
                        </td>
                        <td class="px-4 py-3">
                            <span class="badge bg-primary">{{ date('l', strtotime("Sunday +{$schedule->day_of_week} days")) }}</span>
                            <br><small class="text-muted">Day {{ $schedule->day_of_week + 1 }}</small>
                        </td>
                        <td class="px-4 py-3">
                            <div class="fw-semibold">{{ $schedule->start_time }} - {{ $schedule->end_time }}</div>
                            <small class="text-muted">
                                @php
                                    $duration = strtotime($schedule->end_time) - strtotime($schedule->start_time);
                                    $hours = floor($duration / 3600);
                                    $minutes = floor(($duration % 3600) / 60);
                                @endphp
                                {{ $hours }}h {{ $minutes }}m
                            </small>
                        </td>
                        <td class="px-4 py-3">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-outline-primary">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this schedule?')">
                                        <i class="fas fa-trash-alt me-1"></i>Delete
                                    </button>
                                </form>
                            </div>
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
    <h5 class="text-muted mb-2">No Schedules Created</h5>
    <p class="text-muted">Start by creating your first teaching schedule.</p>
    <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create First Schedule
    </a>
</div>
@endif
@endsection

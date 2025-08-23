@extends('layouts.app')

@section('title', 'Mark Academic Attendance')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="d-flex align-items-center">
        <div class="academic-icon me-3">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div>
            <h1 class="h2 mb-1">Mark Attendance</h1>
            <p class="text-muted mb-0">
                <i class="fas fa-book-open me-1"></i>{{ $schedule->subject->name }} - 
                <i class="fas fa-users me-1"></i>{{ $schedule->schoolClass->name }}
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-clipboard-check me-2"></i>
                    Attendance Registration
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('teacher.attendance.store') }}" method="POST" id="attendanceForm">
                    @csrf
                    <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">

                    <!-- Schedule Information -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3">
                                <h6 class="fw-semibold text-academic mb-2">
                                    <i class="fas fa-info-circle me-2"></i>Session Details
                                </h6>
                                <div class="small">
                                    <div class="mb-1">
                                        <i class="fas fa-book text-muted me-2"></i>
                                        <strong>Subject:</strong> {{ $schedule->subject->name }}
                                    </div>
                                    <div class="mb-1">
                                        <i class="fas fa-users text-muted me-2"></i>
                                        <strong>Class:</strong> {{ $schedule->schoolClass->name }}
                                    </div>
                                    <div class="mb-1">
                                        <i class="fas fa-calendar text-muted me-2"></i>
                                        <strong>Day:</strong> {{ date('l') }}
                                    </div>
                                    <div>
                                        <i class="fas fa-clock text-muted me-2"></i>
                                        <strong>Time:</strong> {{ date('H:i', strtotime($schedule->start_time)) }} - {{ date('H:i', strtotime($schedule->end_time)) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3">
                                <h6 class="fw-semibold text-academic mb-2">
                                    <i class="fas fa-map-marker-alt me-2"></i>Location Status
                                </h6>
                                <div id="locationStatus" class="d-flex align-items-center">
                                    <div class="spinner-border spinner-border-sm text-primary me-2" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <span class="text-info">Detecting your location...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="notes" class="form-label fw-semibold">
                            <i class="fas fa-sticky-note me-2 text-muted"></i>
                            Additional Notes <span class="text-muted fw-normal">(Optional)</span>
                        </label>
                        <textarea 
                            class="form-control" 
                            id="notes" 
                            name="notes" 
                            rows="4"
                            placeholder="Add any relevant notes about this attendance session (e.g., special activities, announcements, etc.)"
                        ></textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('teacher.dashboard') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                        </a>
                        <button type="submit" class="btn btn-success btn-lg px-4" id="markAttendanceBtn" disabled>
                            <i class="fas fa-check-circle me-2"></i>Mark Attendance
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="fas fa-shield-alt me-2"></i>
                    Security Information
                </h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0 small">
                    <li class="mb-2">
                        <i class="fas fa-lock text-success me-2"></i>
                        Location verification is required
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt text-info me-2"></i>
                        GPS coordinates are encrypted
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-clock text-warning me-2"></i>
                        Timestamp is automatically recorded
                    </li>
                    <li class="mb-0">
                        <i class="fas fa-database text-muted me-2"></i>
                        Data is securely stored
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm mt-3">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="fas fa-question-circle me-2"></i>
                    Troubleshooting
                </h6>
            </div>
            <div class="card-body">
                <div class="small text-muted">
                    <p class="mb-2"><strong>Location not detected?</strong></p>
                    <ul class="mb-0">
                        <li>Enable location services</li>
                        <li>Allow browser permissions</li>
                        <li>Check GPS signal strength</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const markAttendanceBtn = document.getElementById('markAttendanceBtn');
    const locationStatus = document.getElementById('locationStatus');
    const latitudeInput = document.getElementById('latitude');
    const longitudeInput = document.getElementById('longitude');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            latitudeInput.value = position.coords.latitude;
            longitudeInput.value = position.coords.longitude;
            markAttendanceBtn.disabled = false;
            locationStatus.innerHTML = `
                <i class="fas fa-check-circle text-success me-2"></i>
                <span class="text-success fw-semibold">Location verified successfully</span>
            `;
        }, function (error) {
            locationStatus.innerHTML = `
                <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                <span class="text-danger">Unable to detect location. Please enable location services.</span>
            `;
            console.error('Error getting location:', error);
        });
    } else {
        locationStatus.innerHTML = `
            <i class="fas fa-times-circle text-danger me-2"></i>
            <span class="text-danger">Geolocation is not supported by your browser.</span>
        `;
    }
});
</script>
@endsection

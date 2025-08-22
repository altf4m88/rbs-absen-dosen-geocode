@extends('layouts.app')

@section('title', 'Mark Attendance')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mark Attendance for {{ $schedule->subject->name }} - {{ $schedule->schoolClass->name }}</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Attendance Details</div>
            <div class="card-body">
                <form action="{{ route('teacher.attendance.store') }}" method="POST" id="attendanceForm">
                    @csrf
                    <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">

                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes (Optional)</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" id="markAttendanceBtn" disabled>Mark Attendance</button>
                    <p id="locationStatus" class="mt-2 text-info">Getting your location...</p>
                </form>
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
                locationStatus.textContent = 'Location obtained. You can now mark attendance.';
                locationStatus.classList.remove('text-info');
                locationStatus.classList.add('text-success');
            }, function (error) {
                locationStatus.textContent = 'Unable to get your location. Please enable location services.';
                locationStatus.classList.remove('text-info');
                locationStatus.classList.add('text-danger');
                console.error('Error getting location:', error);
            });
        } else {
            locationStatus.textContent = 'Geolocation is not supported by your browser.';
            locationStatus.classList.remove('text-info');
            locationStatus.classList.add('text-danger');
        }
    });
</script>
@endsection

@extends('layouts.app')

@section('title', 'Principal Reports')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Attendance Reports</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('principal.reports.download') }}" class="btn btn-sm btn-primary">
            Download Full Report (Excel)
        </a>
    </div>
</div>

<div class="accordion" id="attendanceAccordion">
    @foreach ($attendances as $userId => $userAttendances)
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{ $userId }}">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $userId }}" aria-expanded="false" aria-controls="collapse{{ $userId }}">
                <strong>{{ $userAttendances->first()->user->name }}</strong> ({{ $userAttendances->first()->user->email }}) - {{ $userAttendances->count() }} records
            </button>
        </h2>
        <div id="collapse{{ $userId }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $userId }}" data-bs-parent="#attendanceAccordion">
            <div class="accordion-body">
                <a href="{{ route('principal.reports.download.pdf', ['user' => $userId]) }}" class="btn btn-sm btn-outline-danger mb-3">
                    Download PDF for this User
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Attendance Time</th>
                                <th>Status</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userAttendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->schedule->subject->name }}</td>
                                <td>{{ $attendance->schedule->schoolClass->name }}</td>
                                <td>{{ $attendance->attendance_time }}</td>
                                <td>{{ $attendance->status }}</td>
                                <td>{{ $attendance->notes }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@extends('layouts.app')

@section('title', 'Edit Schedule')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Schedule</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Schedule Details</div>
            <div class="card-body">
                <form action="{{ route('admin.schedules.update', $schedule->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Teacher</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ $schedule->user_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="subject_id" class="form-label">Subject</label>
                        <select class="form-control" id="subject_id" name="subject_id" required>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $schedule->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="school_class_id" class="form-label">Class</label>
                        <select class="form-control" id="school_class_id" name="school_class_id" required>
                            @foreach ($schoolClasses as $class)
                                <option value="{{ $class->id }}" {{ $schedule->school_class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="day_of_week" class="form-label">Day of Week</label>
                        <select class="form-control" id="day_of_week" name="day_of_week" required>
                            <option value="1" {{ $schedule->day_of_week == 1 ? 'selected' : '' }}>Monday</option>
                            <option value="2" {{ $schedule->day_of_week == 2 ? 'selected' : '' }}>Tuesday</option>
                            <option value="3" {{ $schedule->day_of_week == 3 ? 'selected' : '' }}>Wednesday</option>
                            <option value="4" {{ $schedule->day_of_week == 4 ? 'selected' : '' }}>Thursday</option>
                            <option value="5" {{ $schedule->day_of_week == 5 ? 'selected' : '' }}>Friday</option>
                            <option value="6" {{ $schedule->day_of_week == 6 ? 'selected' : '' }}>Saturday</option>
                            <option value="7" {{ $schedule->day_of_week == 7 ? 'selected' : '' }}>Sunday</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $schedule->start_time }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">End Time</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $schedule->end_time }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

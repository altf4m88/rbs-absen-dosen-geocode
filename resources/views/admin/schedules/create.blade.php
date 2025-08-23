@extends('layouts.app')

@section('title', 'Create Academic Schedule')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="d-flex align-items-center">
        <div class="academic-icon me-3">
            <i class="fas fa-calendar-plus"></i>
        </div>
        <div>
            <h1 class="h2 mb-1">Create New Academic Schedule</h1>
            <p class="text-muted mb-0">Add a new teaching schedule to the academic calendar</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-calendar-alt me-2"></i>
                    Schedule Details
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.schedules.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="user_id" class="form-label fw-semibold">
                                <i class="fas fa-chalkboard-teacher me-2 text-muted"></i>Instructor
                            </label>
                            <select class="form-control form-control-lg" id="user_id" name="user_id" required>
                                <option value="">Select an instructor...</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="subject_id" class="form-label fw-semibold">
                                <i class="fas fa-book-open me-2 text-muted"></i>Subject
                            </label>
                            <select class="form-control form-control-lg" id="subject_id" name="subject_id" required>
                                <option value="">Select a subject...</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->name }} ({{ $subject->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="school_class_id" class="form-label fw-semibold">
                                <i class="fas fa-users me-2 text-muted"></i>Class/Section
                            </label>
                            <select class="form-control form-control-lg" id="school_class_id" name="school_class_id" required>
                                <option value="">Select a class...</option>
                                @foreach ($schoolClasses as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="day_of_week" class="form-label fw-semibold">
                                <i class="fas fa-calendar-day me-2 text-muted"></i>Day of Week
                            </label>
                            <select class="form-control form-control-lg" id="day_of_week" name="day_of_week" required>
                                <option value="">Select a day...</option>
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                                <option value="7">Sunday</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="start_time" class="form-label fw-semibold">
                                <i class="fas fa-clock me-2 text-muted"></i>Start Time
                            </label>
                            <input type="time" class="form-control form-control-lg" id="start_time" name="start_time" required>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="end_time" class="form-label fw-semibold">
                                <i class="fas fa-clock me-2 text-muted"></i>End Time
                            </label>
                            <input type="time" class="form-control form-control-lg" id="end_time" name="end_time" required>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.schedules.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Schedules
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg px-4">
                            <i class="fas fa-save me-2"></i>Create Schedule
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
                    <i class="fas fa-info-circle me-2"></i>
                    Guidelines
                </h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Select appropriate instructor for the subject
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Ensure time slots don't overlap
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check text-success me-2"></i>
                        Verify class capacity and availability
                    </li>
                    <li class="mb-0">
                        <i class="fas fa-check text-success me-2"></i>
                        Follow institutional scheduling policies
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="card border-0 shadow-sm mt-3">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="fas fa-clock me-2"></i>
                    Time Format
                </h6>
            </div>
            <div class="card-body">
                <p class="mb-2 small text-muted">Use 24-hour format for scheduling:</p>
                <ul class="list-unstyled small mb-0">
                    <li><strong>08:00</strong> - 8:00 AM</li>
                    <li><strong>13:30</strong> - 1:30 PM</li>
                    <li><strong>15:45</strong> - 3:45 PM</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

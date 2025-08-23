@extends('layouts.app')

@section('title', 'Administrator Dashboard')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="academic-icon me-3" style="width: 3.5rem; height: 3.5rem;">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">Administrator Dashboard</h1>
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

<!-- Quick Stats Cards -->
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <div class="academic-icon mx-auto mb-2" style="background: linear-gradient(135deg, #059669, #10b981);">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title mb-1">Total Users</h5>
                <h3 class="text-success mb-0">{{ \App\Models\User::count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <div class="academic-icon mx-auto mb-2" style="background: linear-gradient(135deg, #3b82f6, #60a5fa);">
                    <i class="fas fa-book"></i>
                </div>
                <h5 class="card-title mb-1">Subjects</h5>
                <h3 class="text-primary mb-0">{{ \App\Models\Subject::count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <div class="academic-icon mx-auto mb-2" style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h5 class="card-title mb-1">Classes</h5>
                <h3 class="text-warning mb-0">{{ \App\Models\SchoolClass::count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <div class="academic-icon mx-auto mb-2" style="background: linear-gradient(135deg, #8b5cf6, #a78bfa);">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h5 class="card-title mb-1">Schedules</h5>
                <h3 class="text-info mb-0">{{ \App\Models\Schedule::count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Management Cards -->
<div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h5 class="card-title">User Management</h5>
                <p class="card-text">
                    Manage user accounts, roles, and permissions. Add, edit, or deactivate 
                    faculty members, administrators, and system users.
                </p>
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>Manage Users
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-book-open"></i>
                </div>
                <h5 class="card-title">Subject Catalog</h5>
                <p class="card-text">
                    Maintain the academic subject catalog. Add new courses, update 
                    subject codes, and manage curriculum offerings.
                </p>
                <a href="{{ route('admin.subjects.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>Manage Subjects
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-chalkboard"></i>
                </div>
                <h5 class="card-title">Class Administration</h5>
                <p class="card-text">
                    Configure academic classes and sections. Manage class hierarchies, 
                    capacity settings, and organizational structures.
                </p>
                <a href="{{ route('admin.school-classes.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>Manage Classes
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h5 class="card-title">Academic Scheduling</h5>
                <p class="card-text">
                    Create and publish teaching schedules. Coordinate faculty timetables, 
                    classroom allocations, and academic calendar events.
                </p>
                <a href="{{ route('admin.schedules.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>Manage Schedules
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h5 class="card-title">Location Configuration</h5>
                <p class="card-text">
                    Configure geofencing parameters and location settings. Set attendance 
                    zones, GPS accuracy requirements, and security boundaries.
                </p>
                <a href="{{ route('admin.settings.location') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>Location Settings
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h5 class="card-title">Analytics & Reports</h5>
                <p class="card-text">
                    Access comprehensive attendance reports and analytics. Generate insights 
                    for institutional planning and academic assessment.
                </p>
                <a href="{{ route('admin.reports.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>View Reports
                </a>
            </div>
        </div>
    </div>
</div>

<!-- System Information Panel -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <div class="d-flex align-items-center">
                    <i class="fas fa-info-circle me-2 text-academic"></i>
                    <h6 class="mb-0 fw-semibold">System Information</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <small class="text-muted">System Version</small>
                        <div class="fw-semibold">RBS Academic v2.0</div>
                    </div>
                    <div class="col-md-4">
                        <small class="text-muted">Last Updated</small>
                        <div class="fw-semibold">{{ date('M j, Y') }}</div>
                    </div>
                    <div class="col-md-4">
                        <small class="text-muted">Administrator</small>
                        <div class="fw-semibold">{{ Auth::user()->name }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

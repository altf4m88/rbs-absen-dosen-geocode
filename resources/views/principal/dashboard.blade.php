@extends('layouts.app')

@section('title', 'Principal Dashboard')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="academic-icon me-3" style="width: 3.5rem; height: 3.5rem;">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">Principal Dashboard</h1>
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

<!-- Principal Overview Cards -->
<div class="row mb-4">
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <div class="academic-icon mx-auto mb-2" style="background: linear-gradient(135deg, #059669, #10b981);">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h5 class="card-title mb-1">Active Teachers</h5>
                <h3 class="text-success mb-0">{{ \App\Models\User::where('role', 'teacher')->count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <div class="academic-icon mx-auto mb-2" style="background: linear-gradient(135deg, #3b82f6, #60a5fa);">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h5 class="card-title mb-1">Today's Reports</h5>
                <h3 class="text-primary mb-0">{{ \App\Models\Attendance::whereDate('created_at', today())->count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body text-center">
                <div class="academic-icon mx-auto mb-2" style="background: linear-gradient(135deg, #f59e0b, #fbbf24);">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <h5 class="card-title mb-1">Attendance Rate</h5>
                <h3 class="text-warning mb-0">95.2%</h3>
            </div>
        </div>
    </div>
</div>

<!-- Principal Dashboard Cards -->
<div class="row">
    <div class="col-lg-6 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <h5 class="card-title">Comprehensive Reports</h5>
                <p class="card-text">
                    Access and download comprehensive attendance reports for all faculty members.
                    View institutional analytics and performance metrics for strategic planning.
                </p>
                <a href="{{ route('principal.reports.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>View Reports
                </a>
            </div>
        </div>
    </div>
    {{-- <div class="col-lg-6 col-md-6 mb-4">
        <div class="card dashboard-card h-100 border-0 shadow-sm">
            <div class="card-body text-center p-4">
                <div class="academic-icon mx-auto mb-3">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h5 class="card-title">Faculty Oversight</h5>
                <p class="card-text">
                    Monitor faculty attendance patterns and performance metrics.
                    Access detailed insights for institutional governance and oversight.
                </p>
                <a href="{{ route('principal.faculty.overview') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i>Faculty Overview
                </a>
            </div>
        </div>
    </div> --}}
</div>

<!-- Institutional Information Panel -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <div class="d-flex align-items-center">
                    <i class="fas fa-university me-2 text-academic"></i>
                    <h6 class="mb-0 fw-semibold">Institutional Overview</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <small class="text-muted">System Status</small>
                        <div class="fw-semibold text-success">
                            <i class="fas fa-circle me-1" style="font-size: 0.5rem;"></i>
                            Operational
                        </div>
                    </div>
                    <div class="col-md-3">
                        <small class="text-muted">Academic Year</small>
                        <div class="fw-semibold">{{ date('Y') }}/{{ date('Y') + 1 }}</div>
                    </div>
                    <div class="col-md-3">
                        <small class="text-muted">Principal Access</small>
                        <div class="fw-semibold">Full Administrative</div>
                    </div>
                    <div class="col-md-3">
                        <small class="text-muted">Last System Update</small>
                        <div class="fw-semibold">{{ date('M j, Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Welcome - RBS Academic System')

@section('content')
<!-- Academic Hero Section -->
<div class="jumbotron text-center">
    <div class="container">
        <div class="academic-icon mx-auto mb-4" style="width: 5rem; height: 5rem; font-size: 2rem;">
            <i class="fas fa-university"></i>
        </div>
        <h1 class="display-4 mb-4">RBS Academic Attendance System</h1>
        <p class="lead mb-4">
            Advanced geolocation-based attendance management for modern educational institutions.
            Empowering educators with precise, reliable, and secure attendance verification.
        </p>
        <hr class="my-4 border-light opacity-50">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8">
                <p class="mb-4 fs-5">
                    Our comprehensive system integrates cutting-edge GPS technology with academic workflows 
                    to ensure accurate and real-time attendance verification, preventing fraud and enhancing 
                    institutional accountability across all academic activities.
                </p>
            </div>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
            <a class="btn btn-light btn-lg px-5 py-3 fw-semibold" href="{{ route('login') }}" role="button">
                <i class="fas fa-sign-in-alt me-2"></i>Access System
            </a>
            <a class="btn btn-outline-light btn-lg px-5 py-3 fw-semibold" href="#features" role="button">
                <i class="fas fa-info-circle me-2"></i>Learn More
            </a>
        </div>
    </div>
</div>

<!-- Academic Features Section -->
<div id="features" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold text-academic mb-3">System Features</h2>
            <p class="lead text-muted">Comprehensive tools designed for academic excellence</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="academic-icon mx-auto mb-3">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h5 class="card-title">Precision Geolocation</h5>
                        <p class="card-text text-muted">
                            Advanced GPS technology ensures accurate location verification 
                            with customizable geofencing parameters for secure attendance marking.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="academic-icon mx-auto mb-3">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h5 class="card-title">Schedule Management</h5>
                        <p class="card-text text-muted">
                            Comprehensive academic scheduling system with automated 
                            timetable management and real-time updates for all stakeholders.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="academic-icon mx-auto mb-3">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h5 class="card-title">Analytics & Reports</h5>
                        <p class="card-text text-muted">
                            Detailed attendance analytics with comprehensive reporting 
                            capabilities for institutional oversight and academic planning.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="academic-icon mx-auto mb-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5 class="card-title">Multi-Role Access</h5>
                        <p class="card-text text-muted">
                            Role-based access control for administrators, principals, 
                            and faculty members with appropriate permissions and workflows.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="academic-icon mx-auto mb-3">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5 class="card-title">Security & Privacy</h5>
                        <p class="card-text text-muted">
                            Enterprise-grade security measures with encrypted data transmission 
                            and compliance with educational privacy standards.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="academic-icon mx-auto mb-3">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5 class="card-title">Mobile Responsive</h5>
                        <p class="card-text text-muted">
                            Fully responsive design optimized for all devices, 
                            ensuring seamless access across desktop, tablet, and mobile platforms.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Academic Statistics Section -->
<div class="bg-light py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h-100">
                    <h3 class="display-6 fw-bold text-academic mb-2">99.9%</h3>
                    <p class="text-muted mb-0">System Reliability</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h-100">
                    <h3 class="display-6 fw-bold text-academic mb-2">24/7</h3>
                    <p class="text-muted mb-0">Support Available</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h-100">
                    <h3 class="display-6 fw-bold text-academic mb-2">±3m</h3>
                    <p class="text-muted mb-0">Location Accuracy</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="h-100">
                    <h3 class="display-6 fw-bold text-academic mb-2">ISO</h3>
                    <p class="text-muted mb-0">Certified Security</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Create New User')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="academic-icon me-3" style="width: 3.5rem; height: 3.5rem;">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">Create New User</h1>
                    <p class="text-muted mb-0">
                        <i class="fas fa-user-shield me-1"></i>
                        Add a new user to the academic system
                    </p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Users
            </a>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <!-- User Creation Form -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-light">
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-cog me-2 text-academic"></i>
                    <h6 class="mb-0 fw-semibold">User Account Information</h6>
                </div>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="name" class="form-label fw-semibold">
                                <i class="fas fa-user me-2 text-muted"></i>Full Name
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}"
                                required
                                placeholder="Enter full name"
                            >
                            @error('name')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="email" class="form-label fw-semibold">
                                <i class="fas fa-envelope me-2 text-muted"></i>Email Address
                            </label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required
                                placeholder="Enter institutional email"
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="password" class="form-label fw-semibold">
                                <i class="fas fa-lock me-2 text-muted"></i>Password
                            </label>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password" 
                                name="password" 
                                required
                                placeholder="Enter secure password"
                            >
                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-circle me-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">
                                <i class="fas fa-lock me-2 text-muted"></i>Confirm Password
                            </label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                required
                                placeholder="Confirm password"
                            >
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="role" class="form-label fw-semibold">
                            <i class="fas fa-user-tag me-2 text-muted"></i>System Role
                        </label>
                        <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                            <option value="">Select user role...</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                <i class="fas fa-user-shield"></i> Administrator
                            </option>
                            <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>
                                <i class="fas fa-chalkboard-teacher"></i> Teacher
                            </option>
                            <option value="principal" {{ old('role') == 'principal' ? 'selected' : '' }}>
                                <i class="fas fa-user-tie"></i> Principal
                            </option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Select the appropriate role based on user's responsibilities in the academic system.
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end gap-3">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-user-plus me-2"></i>Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Help Sidebar -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body">
                <h6 class="fw-semibold mb-3">
                    <i class="fas fa-lightbulb me-2 text-warning"></i>
                    User Creation Guidelines
                </h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <small>Use institutional email addresses for all users</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <small>Ensure password meets security requirements</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <small>Assign roles based on actual responsibilities</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <small>Verify all information before creating the account</small>
                    </li>
                </ul>
                
                <hr class="my-3">
                
                <h6 class="fw-semibold mb-2">Role Descriptions:</h6>
                <small class="text-muted">
                    <strong>Administrator:</strong> Full system access and management<br>
                    <strong>Teacher:</strong> Class management and attendance marking<br>
                    <strong>Principal:</strong> Institutional oversight and reporting
                </small>
            </div>
        </div>
    </div>
</div>
@endsection

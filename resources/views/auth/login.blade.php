@extends('layouts.app')

@section('title', 'Academic System Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7 col-sm-9">
        <!-- Academic Login Card -->
        <div class="card border-0 shadow-lg">
            <div class="card-header text-center py-4">
                <div class="academic-icon mx-auto mb-3" style="width: 4rem; height: 4rem; font-size: 1.5rem;">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h4 class="mb-1 fw-bold">Academic System Access</h4>
                <p class="text-muted mb-0">Please sign in to continue</p>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">
                            <i class="fas fa-envelope me-2 text-muted"></i>Email Address
                        </label>
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control form-control-lg @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="email" 
                            autofocus
                            placeholder="Enter your institutional email"
                        >
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">
                            <i class="fas fa-lock me-2 text-muted"></i>Password
                        </label>
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control form-control-lg @error('password') is-invalid @enderror" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        >
                        @error('password')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input 
                                class="form-check-input" 
                                type="checkbox" 
                                name="remember" 
                                id="remember" 
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <label class="form-check-label text-muted" for="remember">
                                Keep me signed in on this device
                            </label>
                        </div>
                    </div>

                    <div class="mb-0">
                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-semibold py-3">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            Access Academic System
                        </button>
                    </div>
                </form>
            </div>
            
            <div class="card-footer text-center bg-light py-3">
                <small class="text-muted">
                    <i class="fas fa-shield-alt me-1"></i>
                    Secure institutional access • Academic Year {{ date('Y') }}
                </small>
            </div>
        </div>
        
        <!-- Help Information -->
        <div class="text-center mt-4">
            <p class="text-muted">
                <i class="fas fa-question-circle me-1"></i>
                Need assistance? Contact your system administrator.
            </p>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Enhanced login form interactions
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.form-control');
    
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });
    });
});
</script>
@endsection

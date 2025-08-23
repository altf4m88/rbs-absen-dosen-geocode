@extends('layouts.app')

@section('title', 'User Management')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="academic-icon me-3" style="width: 3.5rem; height: 3.5rem;">
                    <i class="fas fa-users-cog"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">User Management</h1>
                    <p class="text-muted mb-0">
                        <i class="fas fa-user-shield me-1"></i>
                        Manage system users, roles, and permissions
                    </p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New User
            </a>
        </div>
    </div>
</div>

<!-- Users Management Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-light">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fas fa-table me-2 text-academic"></i>
                <h6 class="mb-0 fw-semibold">System Users Directory</h6>
            </div>
            <small class="text-muted">{{ $users->count() }} total users</small>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3 fw-semibold text-muted">#</th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-user me-2"></i>Name
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-envelope me-2"></i>Email
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-user-tag me-2"></i>Role
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-cogs me-2"></i>Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-3 text-muted">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                <div class="academic-icon me-3" style="width: 2rem; height: 2rem; font-size: 0.75rem;">
                                    @if($user->role === 'admin')
                                        <i class="fas fa-user-shield"></i>
                                    @elseif($user->role === 'teacher')
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    @elseif($user->role === 'principal')
                                        <i class="fas fa-user-tie"></i>
                                    @else
                                        <i class="fas fa-user"></i>
                                    @endif
                                </div>
                                <span class="fw-semibold">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-muted">{{ $user->email }}</td>
                        <td class="px-4 py-3">
                            @if($user->role === 'admin')
                                <span class="badge bg-danger">Administrator</span>
                            @elseif($user->role === 'teacher')
                                <span class="badge bg-primary">Teacher</span>
                            @elseif($user->role === 'principal')
                                <span class="badge bg-success">Principal</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($user->role) }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-primary">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="fas fa-trash-alt me-1"></i>Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if($users->isEmpty())
<div class="text-center py-5">
    <div class="academic-icon mx-auto mb-3" style="width: 4rem; height: 4rem; opacity: 0.5;">
        <i class="fas fa-users"></i>
    </div>
    <h5 class="text-muted mb-2">No Users Found</h5>
    <p class="text-muted">Start by adding your first system user.</p>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add First User
    </a>
</div>
@endif
@endsection

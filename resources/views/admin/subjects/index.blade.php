@extends('layouts.app')

@section('title', 'Subject Management')

@section('content')
<!-- Academic Page Header -->
<div class="page-header bg-white rounded-3 shadow-sm mb-4">
    <div class="row align-items-center">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="academic-icon me-3" style="width: 3.5rem; height: 3.5rem;">
                    <i class="fas fa-book-open"></i>
                </div>
                <div>
                    <h1 class="h2 mb-1">Subject Catalog</h1>
                    <p class="text-muted mb-0">
                        <i class="fas fa-graduation-cap me-1"></i>
                        Manage academic subject catalog and curriculum
                    </p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Subject
            </a>
        </div>
    </div>
</div>

<!-- Subjects Management Card -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-light">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fas fa-table me-2 text-academic"></i>
                <h6 class="mb-0 fw-semibold">Academic Subjects Directory</h6>
            </div>
            <small class="text-muted">{{ $subjects->count() }} total subjects</small>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="px-4 py-3 fw-semibold text-muted">#</th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-book me-2"></i>Subject Name
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-hashtag me-2"></i>Code
                        </th>
                        <th class="px-4 py-3 fw-semibold text-muted">
                            <i class="fas fa-cogs me-2"></i>Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                    <tr>
                        <td class="px-4 py-3 text-muted">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                <div class="academic-icon me-3" style="width: 2rem; height: 2rem; font-size: 0.75rem;">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $subject->name }}</div>
                                    <small class="text-muted">Academic Subject</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="badge bg-secondary">{{ $subject->code }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-outline-primary">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this subject?')">
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

@if($subjects->isEmpty())
<div class="text-center py-5">
    <div class="academic-icon mx-auto mb-3" style="width: 4rem; height: 4rem; opacity: 0.5;">
        <i class="fas fa-book-open"></i>
    </div>
    <h5 class="text-muted mb-2">No Subjects Found</h5>
    <p class="text-muted">Start by adding your first academic subject to the catalog.</p>
    <a href="{{ route('admin.subjects.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add First Subject
    </a>
</div>
@endif

<!-- Subject Information Panel -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-graduation-cap me-2 text-academic"></i>
                            <small class="text-muted">Curriculum Management</small>
                        </div>
                        <div class="fw-semibold">Academic Standards Compliant</div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle me-2 text-success"></i>
                            <small class="text-muted">Subject Validation</small>
                        </div>
                        <div class="fw-semibold">All subjects verified</div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-calendar-alt me-2 text-warning"></i>
                            <small class="text-muted">Academic Year</small>
                        </div>
                        <div class="fw-semibold">{{ date('Y') }}/{{ date('Y') + 1 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

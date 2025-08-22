@extends('layouts.app')

@section('title', 'Edit School Class')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit School Class</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Class Details</div>
            <div class="card-body">
                <form action="{{ route('admin.school-classes.update', $schoolClass->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $schoolClass->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

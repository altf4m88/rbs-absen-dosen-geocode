@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Admin Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Manage Users</h5>
                <p class="card-text">Add, edit, or delete user accounts.</p>
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Go to Users</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Manage Subjects</h5>
                <p class="card-text">Add, edit, or delete subjects.</p>
                <a href="{{ route('admin.subjects.index') }}" class="btn btn-primary">Go to Subjects</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Manage School Classes</h5>
                <p class="card-text">Add, edit, or delete school classes.</p>
                <a href="{{ route('admin.school-classes.index') }}" class="btn btn-primary">Go to Classes</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Manage Schedules</h5>
                <p class="card-text">Create, edit, or publish teaching schedules.</p>
                <a href="{{ route('admin.schedules.index') }}" class="btn btn-primary">Go to Schedules</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Location Settings</h5>
                <p class="card-text">Configure geofencing coordinates and radius.</p>
                <a href="{{ route('admin.settings.location') }}" class="btn btn-primary">Go to Settings</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">View Reports</h5>
                <p class="card-text">View attendance reports for all users.</p>
                <a href="{{ route('admin.reports.index') }}" class="btn btn-primary">Go to Reports</a>
            </div>
        </div>
    </div>
</div>
@endsection

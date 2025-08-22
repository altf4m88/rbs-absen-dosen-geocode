@extends('layouts.app')

@section('title', 'Principal Dashboard')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Principal Dashboard</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">View All Attendance Reports</h5>
                <p class="card-text">Access and download comprehensive attendance reports for all teachers.</p>
                <a href="{{ route('principal.reports.index') }}" class="btn btn-primary">View Reports</a>
            </div>
        </div>
    </div>
</div>
@endsection

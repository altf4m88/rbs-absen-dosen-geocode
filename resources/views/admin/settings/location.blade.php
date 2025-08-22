@extends('layouts.app')

@section('title', 'Location Settings')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Location Settings (Geofencing)</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Configure Allowed Location</div>
            <div class="card-body">
                <form action="{{ route('admin.settings.location.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $settings['latitude']->value ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $settings['longitude']->value ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="radius" class="form-label">Radius (meters)</label>
                        <input type="number" class="form-control" id="radius" name="radius" value="{{ $settings['radius']->value ?? '' }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

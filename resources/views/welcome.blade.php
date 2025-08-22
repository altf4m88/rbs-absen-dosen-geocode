@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Welcome to RBS Absen Dosen Geocode</h1>
    <p class="lead">Your smart attendance and scheduling system for teachers and lecturers.</p>
    <hr class="my-4">
    <p>This system integrates GPS technology to ensure accurate and real-time attendance verification, preventing fraud and enhancing accountability.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Get Started</a>
</div>
@endsection
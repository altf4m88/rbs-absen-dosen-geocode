@extends('layouts.app')

@section('title', 'Manage School Classes')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage School Classes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.school-classes.create') }}" class="btn btn-sm btn-outline-secondary">
            Add New Class
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $class->name }}</td>
                <td>
                    <a href="{{ route('admin.school-classes.edit', $class->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.school-classes.destroy', $class->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

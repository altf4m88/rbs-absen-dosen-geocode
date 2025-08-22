<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {
        // Validation and store logic here
        return redirect()->route('admin.subjects.index');
    }

    public function edit(Subject $subject)
    {
        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        // Validation and update logic here
        return redirect()->route('admin.subjects.index');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('admin.subjects.index');
    }
}

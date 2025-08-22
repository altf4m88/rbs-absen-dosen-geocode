<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();
        return view('admin.school_classes.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.school_classes.create');
    }

    public function store(Request $request)
    {
        // Validation and store logic here
        return redirect()->route('admin.school_classes.index');
    }

    public function edit(SchoolClass $schoolClass)
    {
        return view('admin.school_classes.edit', compact('schoolClass'));
    }

    public function update(Request $request, SchoolClass $schoolClass)
    {
        // Validation and update logic here
        return redirect()->route('admin.school_classes.index');
    }

    public function destroy(SchoolClass $schoolClass)
    {
        $schoolClass->delete();
        return redirect()->route('admin.school_classes.index');
    }
}

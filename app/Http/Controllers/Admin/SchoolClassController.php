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
        $request->validate([
            'name' => 'required|string|max:255|unique:school_classes',
        ]);

        SchoolClass::create($request->all());

        return redirect()->route('admin.school-classes.index');
    }

    public function edit(SchoolClass $schoolClass)
    {
        return view('admin.school_classes.edit', compact('schoolClass'));
    }

    public function update(Request $request, SchoolClass $schoolClass)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:school_classes,name,' . $schoolClass->id,
        ]);

        $schoolClass->update($request->all());

        return redirect()->route('admin.school-classes.index');
    }

    public function destroy(SchoolClass $schoolClass)
    {
        $schoolClass->delete();
        return redirect()->route('admin.school_classes.index');
    }
}

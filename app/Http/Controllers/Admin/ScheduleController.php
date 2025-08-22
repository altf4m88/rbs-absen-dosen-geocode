<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['user', 'subject', 'schoolClass'])->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $teachers = \App\Models\User::where('role', 'teacher')->get();
        $subjects = \App\Models\Subject::all();
        $schoolClasses = \App\Models\SchoolClass::all();
        return view('admin.schedules.create', compact('teachers', 'subjects', 'schoolClasses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'day_of_week' => 'required|integer|between:1,7',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin.schedules.index');
    }

    public function edit(Schedule $schedule)
    {
        $teachers = \App\Models\User::where('role', 'teacher')->get();
        $subjects = \App\Models\Subject::all();
        $schoolClasses = \App\Models\SchoolClass::all();
        return view('admin.schedules.edit', compact('schedule', 'teachers', 'subjects', 'schoolClasses'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'school_class_id' => 'required|exists:school_classes,id',
            'day_of_week' => 'required|integer|between:1,7',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index');
    }
}

<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function create(Schedule $schedule)
    {
        return view('teacher.attendance.create', compact('schedule'));
    }

    public function store(Request $request)
    {
        // Geolocation validation and attendance recording logic here
        Attendance::create([
            'schedule_id' => $request->schedule_id,
            'user_id' => Auth::id(),
            'attendance_time' => now(),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'notes' => $request->notes,
            'status' => 'present', // Status will be set based on validation
        ]);

        return redirect()->route('teacher.schedule.index');
    }

    public function history()
    {
        $attendances = Attendance::where('user_id', Auth::id())->with(['schedule'])->get();
        return view('teacher.attendance.history', compact('attendances'));
    }
}

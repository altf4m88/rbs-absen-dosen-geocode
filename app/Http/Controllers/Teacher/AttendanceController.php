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
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'notes' => 'nullable|string|max:255',
        ]);

        $allowedLatitude = (float) Setting::where('key', 'latitude')->value('value');
        $allowedLongitude = (float) Setting::where('key', 'longitude')->value('value');
        $allowedRadius = (float) Setting::where('key', 'radius')->value('value');

        $userLatitude = (float) $request->latitude;
        $userLongitude = (float) $request->longitude;

        // Calculate distance using Haversine formula
        $earthRadius = 6371000; // meters

        $latDiff = deg2rad($userLatitude - $allowedLatitude);
        $lonDiff = deg2rad($userLongitude - $allowedLongitude);

        $a = sin($latDiff / 2) * sin($latDiff / 2) +
             cos(deg2rad($allowedLatitude)) * cos(deg2rad($userLatitude)) *
             sin($lonDiff / 2) * sin($lonDiff / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;

        $status = ($distance <= $allowedRadius) ? 'present' : 'outside_geofence';

        Attendance::create([
            'schedule_id' => $request->schedule_id,
            'user_id' => Auth::id(),
            'attendance_time' => now(),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'notes' => $request->notes,
            'status' => $status,
        ]);

        return redirect()->route('teacher.schedule.index')->with('status', 'Attendance recorded as ' . $status);
    }

    public function history()
    {
        $attendances = Attendance::where('user_id', Auth::id())->with(['schedule'])->get();
        return view('teacher.attendance.history', compact('attendances'));
    }
}

<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['user', 'schedule'])->get();
        return view('principal.reports.index', compact('attendances'));
    }

    public function download()
    {
        $attendances = Attendance::with(['user', 'schedule.subject', 'schedule.schoolClass'])->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="attendance_report.csv"',
        ];

        $callback = function() use ($attendances) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['User Name', 'User Email', 'Subject', 'Class', 'Attendance Time', 'Latitude', 'Longitude', 'Notes', 'Status']);

            foreach ($attendances as $attendance) {
                fputcsv($file, [
                    $attendance->user->name,
                    $attendance->user->email,
                    $attendance->schedule->subject->name,
                    $attendance->schedule->schoolClass->name,
                    $attendance->attendance_time,
                    $attendance->latitude,
                    $attendance->longitude,
                    $attendance->notes,
                    $attendance->status,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

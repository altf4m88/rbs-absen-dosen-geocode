<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Exports\AttendancesExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['user', 'schedule.subject', 'schedule.schoolClass'])->get()->groupBy('user_id');
        return view('principal.reports.index', compact('attendances'));
    }

    public function download()
    {
        return Excel::download(new AttendancesExport, 'attendances.xlsx');
    }

    public function downloadPdfByUser(User $user)
    {
        $attendances = Attendance::where('user_id', $user->id)
            ->with(['schedule.subject', 'schedule.schoolClass'])
            ->get();

        $pdf = Pdf::loadView('principal.reports.pdf', [
            'user' => $user,
            'attendances' => $attendances,
        ]);

        return $pdf->download('attendance-report-' . $user->name . '.pdf');
    }
}

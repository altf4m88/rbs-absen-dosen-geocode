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
        // Logic to generate and download PDF/Excel report
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['user', 'schedule'])->get();
        return view('admin.reports.index', compact('attendances'));
    }
}

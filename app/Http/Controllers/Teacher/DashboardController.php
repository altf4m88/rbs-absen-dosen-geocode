<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $schedules = Schedule::where('user_id', Auth::id())->with(['subject', 'schoolClass'])->get();

        return view('teacher.dashboard', compact('schedules'));
    }
}

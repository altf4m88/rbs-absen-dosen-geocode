<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::where('user_id', Auth::id())->with(['subject', 'schoolClass'])->get();
        return view('teacher.schedule', compact('schedules'));
    }
}

<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['user', 'schedule'])->get();
        return view('principal.dashboard', compact('attendances'));
    }
}

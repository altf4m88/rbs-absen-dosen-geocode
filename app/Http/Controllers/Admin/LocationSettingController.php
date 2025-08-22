<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class LocationSettingController extends Controller
{
    public function index()
    {
        $settings = Setting::whereIn('key', ['latitude', 'longitude', 'radius'])->get()->keyBy('key');
        return view('admin.settings.location', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric|min:0',
        ]);

        Setting::updateOrCreate(['key' => 'latitude'], ['value' => $request->latitude]);
        Setting::updateOrCreate(['key' => 'longitude'], ['value' => $request->longitude]);
        Setting::updateOrCreate(['key' => 'radius'], ['value' => $request->radius]);

        return redirect()->back();
    }
}

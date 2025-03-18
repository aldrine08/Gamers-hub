<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $devices = \App\Models\Device::all();
        return view('dashboard', compact('devices')); // Ensure 'dashboard' view exists
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index() 
    {
        $devices = \App\Models\Device::all();
        return view('devices.index', compact('devices'));
    }
    
}

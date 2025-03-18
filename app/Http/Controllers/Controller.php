<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function index()
    {
        // Fetch all devices from the database
        $devices = Device::all();
        return view('dashboard', compact('devices'));
    }
}

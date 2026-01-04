<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function index() 
    {
        $devices = \App\Models\Device::all();
        return view('devices.index', compact('devices'));
    }
    
}

// {
//    public function store(Request $request)
//     {
//         $device = new Device();

//         $device->name = $request->name;
//         $device->price = $request->price;

//         // 👇 THIS IS WHERE IT GOES
//         if ($request->hasFile('image')) {
//             $path = $request->file('image')->store('devices', 'public');
//             $device->image = $path;
//         }

//         $device->save();

//         return redirect()->back()->with('success', 'Device added successfully');
//     }
// }

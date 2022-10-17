<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Gate3;
use App\Models\Log;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Gate3Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Gate 3 Trips In - List|Gate 3 Trips Out - List', ['only' => ['indexIn', 'indexOut', 'store', 'storeout','checkin','checkout']]);
        $this->middleware('permission:Gate 3 Trips Checkin', ['only' => ['checkin', 'store']]);
        $this->middleware('permission:Gate 3 Trips Checkout', ['only' => ['checkOut', 'storeout']]);
    }
    public function indexIn()
    {
        $trips = Trip::where('next_gate', 'Internal Logistics Gate - In')->get();
        return view('gate3trips.indexin', compact('trips'));
    }
    public function indexOut()
    {
        $trips = Trip::where('next_gate', 'Internal Logistics Gate - Out')->get();
        return view('gate3trips.indexout', compact('trips'));
    }
    public function checkin(Request $request, $id)
    {
        return view('gate3trips.checkin', compact('id'));
    }
    public function checkOut($id)
    {
        return view('gate3trips.checkout', compact('id'));
    }
    public function store(Request $request)
    {
        $driver = Driver::find($request->driver_id);
        Gate3::create([
            'trip_id' => $request->trip_id,
            'driver_name' => $driver->driver_name,
            'licence_no' => $driver->licence_no,
        ]);
        $trip = Trip::find($request->trip_id);
        $trip->update([
            'next_gate' => 'Internal Logistics Gate - Out',
        ]);
        $log = Log::where('trip_id', $request->trip_id)->first();
        $log->update([
            'gate3in' => Carbon::now(),
            'gate3in_driver_name' => $driver->driver_name,
            'gate3in_licence_no' => $driver->licence_no,
        ]);
        return redirect(route('gate3.indexin'))->with(['success' => 'Checked In']);
    }
    public function storeout(Request $request)
    {
        $driver = Driver::find($request->driver_id);
        Gate3::create([
            'trip_id' => $request->trip_id,
            'driver_name' => $driver->driver_name,
            'licence_no' => $driver->licence_no,
        ]);
        $trip = Trip::find($request->trip_id);
        $trip->update([
            'next_gate' => 'External Logistics Gate - Out',
        ]);
        $log = Log::where('trip_id', $request->trip_id)->first();
        $log->update([
            'gate3out' => Carbon::now(),
            'gate3out_driver_name' => $driver->driver_name,
            'gate3out_licence_no' => $driver->licence_no,
        ]);

        return redirect(route('gate3.indexout'))->with(['success' => 'Checked Out']);
    }
}

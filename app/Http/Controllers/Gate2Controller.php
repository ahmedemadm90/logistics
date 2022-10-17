<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Gate2;
use App\Models\Log;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Gate2Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Gate 2 Trips In - List|Gate 2 Trips Out - List|Gate 2 Trips Checkin|Gate 2 Trips Checkout', ['only' => ['indexIn', 'indexOut','storein','storeout','checkin','checkout']]);
        $this->middleware('permission:Gate 2 Trips Checkin', ['only' => ['checkin','store']]);
        $this->middleware('permission:Gate 2 Trips Checkout', ['only' => ['checkOut', 'storeout']]);
    }
    public function indexIn()
    {
        $trips = Trip::where('next_gate', 'External Logistics Gate - In')->get();
        return view('gate2trips.indexin',compact('trips'));
    }
    public function indexOut()
    {
        $trips = Trip::where('next_gate', 'External Logistics Gate - Out')->get();
        return view('gate2trips.indexout',compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkin(Request $request,$id)
    {
        return view('gate2trips.checkin',compact('id'));
    }
    public function checkOut(Request $request,$id)
    {
        return view('gate2trips.checkout',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $driver = Driver::find($request->driver_id);
        Gate2::create([
            'trip_id'=>$request->trip_id,
            'driver_name'=> $driver->driver_name,
            'licence_no'=> $driver->licence_no,
        ]);
        $trip = Trip::find($request->trip_id);
        $trip->update([
            'next_gate'=>'Internal Logistics Gate - In',
        ]);
        $log = Log::where('trip_id',$request->trip_id)->first();
        $log->update([
            'gate2in'=>Carbon::now(),
            'gate2in_driver_name'=> $driver->driver_name,
            'gate2in_licence_no'=> $driver->licence_no,
        ]);
        return redirect(route('gate2.indexin'))->with(['success'=>'Checked In']);
    }
    public function storeout(Request $request)
    {
        $driver = Driver::find($request->driver_id);
        Gate2::create([
            'trip_id' => $request->trip_id,
            'driver_name' => $driver->driver_name,
            'licence_no' => $driver->licence_no,
        ]);
        $trip = Trip::find($request->trip_id);
        $trip->update([
            'next_gate' => 'Sheeting',
        ]);
        $log = Log::where('trip_id', $request->trip_id)->first();
        $log->update([
            'gate2out' => Carbon::now(),
            'gate2out_driver_name' => $driver->driver_name,
            'gate2out_licence_no' => $driver->licence_no,
        ]);
        return redirect(route('gate2.indexout'))->with(['success' => 'Checked Out']);
    }

}

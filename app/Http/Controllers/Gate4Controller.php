<?php

namespace App\Http\Controllers;

use App\Models\Gate3;
use App\Models\Gate4;
use App\Models\Log;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Gate4Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Gate 4 Trips Out - List', ['only' => ['indexOut', 'store']]);
        $this->middleware('permission:Gate 4 Trips Checkout', ['only' => ['store']]);
    }
    public function indexout()
    {
        $trips = Trip::where('next_gate','Sheeting')->where('state','active')->get();
        return view('gate4trips.indexout',compact('trips'));
    }

    public function store(Request $request)
    {
        $data = Gate3::where('trip_id',$request->trip_id)->first();
        Gate4::create([
            'trip_id'=> $data->trip_id,
            'driver_name'=> $data->driver_name,
            'licence_no'=> $data->licence_no,
        ]);
        $trip = Trip::find($data->trip_id);
        $trip->update([
            'net_gate'=>'Out',
            'state'=>'Disabled',
        ]);
        $log = Log::where('trip_id', $request->trip_id)->first();
        $log->update([
            'gate4out' => Carbon::now(),
        ]);
        return redirect(route('gate4.indexout'))->with(['success'=>'Trip Ended Successfully']);
    }


}

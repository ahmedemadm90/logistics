<?php

namespace App\Http\Controllers;

use App\Models\Gate1;
use App\Models\Log;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Gate1Controller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Gate 1 Trips List|Gate 1 Trips Active', ['only' => ['index','active']]);
        $this->middleware('permission:Gate 1 Trips Active', ['only' => ['active']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::where('state','Pending')->get();
        return view('gate1trips.index',compact('trips'));
    }
    public function active($id)
    {
        $trip = Trip::find($id);
        $trip->update([
            'state'=>'Active',
            'next_gate'=>'External Logistics Gate - In'
        ]);
        $log = Log::where('trip_id',$id)->first();
        $log->update([
            'gate1in'=>Carbon::now(),
        ]);
        return redirect(route('gate1.index'))->with(['success'=>'Trip Activated']);
    }
}

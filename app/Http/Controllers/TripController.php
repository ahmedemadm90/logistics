<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Gate1;
use App\Models\Log;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Trips List|Trip Create|Trip Edit|Trip Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Trip Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Trip Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Trip Delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        return view('trips.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'truck_no' => 'required|numeric',
            'truck_letter' => 'required|string',
            'trail_no' => 'nullable|numeric',
            'trail_letter' => 'nullable|string',
            'driver_id' => 'required|exists:drivers,id',
        ]);
        $input['state'] = 'Pending';
        $input['next_gate'] = 'Pending';
        $trip = Trip::create($input);
        $driver = Driver::find($request->driver_id);
        $input['driver_name'] = $driver->driver_name;
        $input['licence_no'] = $driver->licence_no;
        $gate1 = Gate1::create([
            'trip_id'=>$trip->id,
            'driver_name'=> $driver->driver_name,
            'licence_no'=> $driver->licence_no,
        ]);
        Log::create([
            'trip_id'=>$trip->id,
            'gate1in'=>$gate1->active_time,
            'gate1in_driver_name'=>$driver->driver_name,
            'gate1in_licence_no'=> $driver->licence_no,
        ]);
        return back()->with(['success'=>'Trip Created Successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip = Trip::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }
}

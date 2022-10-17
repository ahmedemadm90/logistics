<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Drivers List|Driver Create|Driver Edit|Driver Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Driver Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Driver Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Driver Delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('drivers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
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
            "driver_name" => "required|string",
            "licence_no" => "required|unique:drivers,licence_no",
            "licence_grade" => "required",
            "active" => "required",
        ]);
        $input['active'] = '1';
        Driver::create($input);
        return redirect(route('drivers.index'))->with(['success' => 'Driver Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);
        if ($driver) {
            return view('drivers.show', compact('driver'));
        } else {
            return redirect(route('drivers.index'))->with(['error' => 'Invaled Driver']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = Driver::find($id);
        if ($driver) {
            return view('drivers.edit', compact('driver'));
        } else {
            return redirect(route('drivers.index'))->with(['error' => 'Invaled Driver']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $driver = Driver::find($id);
        if($driver){
            $input = $request->all();
            $this->validate($request, [
                "driver_name" => "required|string",
                "licence_no" => "required|unique:drivers,licence_no," . $id,
                "licence_grade" => "required",
                "active" => "required",
            ]);
            $driver->update($input);
            return redirect(route('drivers.index'))->with(['success'=>'Driver Updated Successfully']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::find($id);
        if($driver){
            $driver->delete();
            return redirect(route('drivers.index'))->with(['success' => 'Driver Deleted Successfully']);
        }else{
            return redirect(route('drivers.index'))->with(['error' => 'Invaled Driver']);
        }
    }
}

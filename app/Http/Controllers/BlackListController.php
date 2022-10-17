<?php

namespace App\Http\Controllers;

use App\Models\BlackList;
use App\Models\Driver;
use Illuminate\Http\Request;

class BlackListController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Blacklist List|Blacklist Create|Blacklist Unblock', ['only' => ['index', 'create', 'store', 'unblock']]);
        $this->middleware('permission:Blacklist Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Blacklist Unblock', ['only' => ['unblock']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = BlackList::all();
        return view('blacklist.index',compact('drivers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::where('is_blacklist','0')->get();
        return view('blacklist.create', compact('drivers'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'duration'=>'required|string',
            'company'=>'required|string',
            'block_date'=>'required|date',
            'to_date'=>'required|date',
            'driver_id'=>'required|exists:drivers,id',
        ]);
        $input = $request->all();
        $input['active']='1';
        BlackList::create($input);
        $driver = Driver::find($request->driver_id);
        $driver->update([
            'active'=>'0',
            'is_blacklist'=>'1',
        ]);
        return redirect(route('blacklist.index'))->with(['success'=>'Addedd Successfully']);
    }
    public function unblock($id)
    {
        $row = BlackList::find($id);
        $row->update([
            'active'=>'0',
        ]);
        $driver = Driver::find($row->driver_id);
        $driver->update([
            'active'=>'1',
            'is_blacklist'=>'0',
        ]);
        return redirect(route('blacklist.index'))->with(['success'=>'Un-Blocked Successfully']);

    }
}

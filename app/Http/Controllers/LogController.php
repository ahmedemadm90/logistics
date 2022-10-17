<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Logs List|Log Create|Log Edit|Log Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:Log Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Log Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Log Delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $logs = Log::all();
        return view('logs.logs',compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
